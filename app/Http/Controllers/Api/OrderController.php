<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Order;
use Braintree\Gateway;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function getOrder(Request $request): \Illuminate\Http\JsonResponse
    {

        $order = Order::find($request->id);
        $status = 200;

        if (empty($order)) {
            $order = 'Ordine non trovato';
            $status = 404;
        }

        return response()->json($order, $status);

    }

    public function getToken(Request $request, Gateway $gateway): \Illuminate\Http\JsonResponse
    {

        try {
            //Creo istanza di Braintree dove eseguo la richiesta di generazione di un Token
            $token = $gateway->clientToken()->generate();
            $success = true;

        } catch (\Exception $e) {

            $success = $e;
        }

        $data = [
            'success' => $success,
            'token' => $token
        ];

        return response()->json($data, 200);
    }

    public function makePayment(Request $request, Gateway $gateway): \Illuminate\Http\JsonResponse
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
