<?php

namespace App\Http\Controllers\Api;

use App\Dish;
use App\Http\Controllers\Controller;
use App\Order;
use Braintree\Gateway;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderShipped;

class OrderController extends Controller
{

    /**
     * Set Order in DB and create a new unique client_code
     * @param Request $request instance of Request
     * @return JsonResponse
     */
    public function setOrder(Request $request): JsonResponse
    {
        $request->validate($this->validateOrder());
        $request->all();
        $client_unique = $this->generateUniqueID();
        while (Order::where('client_code', '=', $client_unique)->first()) {
            $client_unique = $this->generateUniqueID();
        }
        $request['client_code'] = $client_unique;
        $dishes = $request->dishes;
        $request['total_price'] = 0;
        foreach ($dishes as $dish) {
            $correct_price = Dish::find($dish['id'])->price;
            if ($correct_price !== $dish['prezzo_singolo']) {
                $dish['prezzo_singolo'] = $correct_price;
            }
            $request['total_price'] += $dish['prezzo_singolo'] * $dish['quantita'];
        }
        $new_order = new Order();
        $new_order->fill($request->toArray());
        if ($new_order->save()) {
            $success = true;
        } else {
            $success = false;
        }
        foreach ($dishes as $dish) {
            if ($new_order->dishes->where('id', '=', $dish['id'])) {
                $new_order->dishes()->attach([
                    $dish['id'] => [
                        'quantita' => $dish['quantita']
                    ]
                ]);
            }
        }

        $order_insert = [
            'success' => $success,
            'order_number' => $new_order->id,
            'client_code' => $new_order->client_code
        ];
        return response()->json($order_insert, 200);
    }

    /**
     * Generate token for Braintree Service
     * @param Gateway $gateway instance of Bentree Gateway Service
     * @return JsonResponse
     */
    public function getToken(Gateway $gateway): JsonResponse
    {
        try {
            //Creo istanza di Braintree dove eseguo la richiesta di generazione di un Token
            $token = $gateway->clientToken()->generate();
            $success = true;
            $status = 200;

        } catch (Exception $e) {

            $success = $e;
            $status = 401;
        }

        $data = [
            'success' => $success,
            'token' => $token
        ];

        return response()->json($data, $status);
    }

    /**
     * Payment request to Braintree service
     * @param Request $request instance of Request
     * @param Gateway $gateway instance of Bentree Gateway Service
     * @return JsonResponse
     */
    public function makePayment(Request $request, Gateway $gateway): JsonResponse
    {
        $verify = '';
        $order = Order::find($request->id_order);
        if ($request->amount != $order->total_price) {
            $verify = 'Rilevato prezzo modificato';
            $request->amount = $order->total_price;
        }

        $payment = $gateway->transaction()->sale([
            'amount' => $request->amount,
            'paymentMethodNonce' => $request->token,
            'options' => [
                'submitForSettlement' => True
            ]
        ]);

        if ($payment->success) {
            $success = true;
            $message = 'Transazione eseguita';
            $status = 200;
            //invio email
            Mail::to('cliente@email.it')->send(new OrderShipped());
            $order->update(['payment_status' => 'accepted']);
        } else {
            $success = false;
            $message = 'Transazione non eseguita';
            $status = 401;
        }

        $data = [
            'success' => $success,
            'message' => $message,
            'verify' => $verify
        ];
        return response()->json($data, $status);
    }

    /**
     * Validation $request from order call
     * @return string[]
     */
    protected function validateOrder(): array
    {
        return [
            'total_price' => 'required|min:0.70',
            'client_name' => 'required|string|max:50',
            'client_address' => 'required|string|max:100',
            'client_number' => 'required|string|max:10',
            'dishes.*.id' => 'required|exists:dishes,id',
            'dishes.*.quantita' => 'required|int|min:1'
        ];
    }

    /**
     * Random generate string
     * @return string
     */
    protected function generateUniqueID(): string
    {
        return Str::random(8);
    }
}
