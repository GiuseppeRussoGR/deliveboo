<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Order;
use Braintree\Gateway;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Richiesta API per recuperare l'ordine del cliente
     * @param Request $request
     * @return JsonResponse
     */
    public function getOrder(Request $request): JsonResponse
    {

        $order = Order::find($request->id);
        $status = 200;

        if (empty($order)) {
            $order = 'Ordine non trovato';
            $status = 404;
        }

        return response()->json($order, $status);

    }

    /**
     * Richiesta per la generazione del Token da inviare al servizio di Braintree
     * @param Gateway $gateway
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
            $status = 404;
        }

        $data = [
            'success' => $success,
            'token' => $token
        ];

        return response()->json($data, $status);
    }

    /**
     * Richiesta di pagamento verso i servizi di BrainTree
     * @param Request $request
     * @param Gateway $gateway
     * @return JsonResponse
     */
    public function makePayment(Request $request, Gateway $gateway): JsonResponse
    {
        $payment = $gateway->transaction()->sale([
            'amount' => $request->total_price,
            'paymentMethodNonce' => $request->token,
            'options' => [
                'submitForSettlement' => True
            ]
        ]);

        if ($payment->success) {
            $success = true;
            $message = 'Transazione eseguita';
            $status = 200;
        } else {
            $success = false;
            $message = 'Transazione non eseguita';
            $status = 401;
        }

        $data = [
            'success' => $success,
            'message' => $message
        ];

        return response()->json($data, $status);
    }
}
