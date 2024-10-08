<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PaymentController extends Controller
{
    public function pay()
    {
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://api.paymongo.com/v1/links",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode([
                'data' => [
                    'attributes' => [
                        'amount' => 50000,
                        'description' => 'asdasdasd',
                        'remarks' => 'payment test1'
                    ]
                ]
            ]),
            CURLOPT_HTTPHEADER => [
                "accept: application/json",
                "authorization: Basic " . base64_encode(env('AUTH_PAY')),
                "content-type: application/json"
            ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            return "cURL Error #:" . $err;
        } else {
            $responseData = json_decode($response, true);
            $checkoutUrl = $responseData['data']['attributes']['checkout_url'] ?? null;
            
            if ($checkoutUrl) {
                return redirect()->away($checkoutUrl);
            } else {
                return "Error: Unable to get checkout URL";
            }
        }
    }

    public function webhook(Request $request)
    {
        $webhook_secret = env('Webhook_Secret');
        $webhook_signature = $request->header('Paymongo-Signature');
        $event_data = $request->getContent();
        
        $signature_parts = explode(',', $webhook_signature);
        $timestamp = explode('=', $signature_parts[0])[1];
        $signature = explode('=', $signature_parts[1])[1];
        
        $signed_payload = $timestamp . '.' . $event_data;
        $computed_signature = hash_hmac('sha256', $signed_payload, $webhook_secret);
        
        if (hash_equals($computed_signature, $signature)) {
            // Store the event data in the session
            Session::put('webhook_data', $event_data);
            
            // You might want to return a success response to PayMongo
            return response('Webhook Received', 200);
        } else {
            // Invalid signature
            return response('Invalid Signature', 400);
        }
    }

    public function showResult()
    {
        $webhook_data = Session::get('webhook_data');
        Session::forget('webhook_data'); // Clear the data after retrieving it
        
        if ($webhook_data) {
            echo "Received webhook data:\n";
            echo json_encode(json_decode($webhook_data), JSON_PRETTY_PRINT);
        } else {
            echo "No webhook data available.";
        }
    }
}