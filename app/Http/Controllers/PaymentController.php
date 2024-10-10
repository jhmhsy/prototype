<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\PaymentTransaction;
use App\Http\Controllers\Admin\TicketController;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;
use Curl;

class PaymentController extends Controller
{
    public function pay(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:15',
            'quantity' => 'required|integer|min:1',
        ]);
        
        // Assuming the ticket price is 50 pesos 
        
        $curl = curl_init();
    
        curl_setopt_array($curl, [
            CURLOPT_URL => "https://api.paymongo.com/v1/checkout_sessions",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode([
                'data' => [
                    'attributes' => [
                        'billing' => [
                            'name' => $validatedData['name'],
                            'email' => $validatedData['email'],
                            'phone' => $validatedData['phone'],
                        ],
                        'send_email_receipt' => false,
                        'show_description' => true,
                        'show_line_items' => true,
                        'line_items' => [
                            [
                                'currency' => 'PHP',
                                'amount' => 5000,
                                'description' => 'item details zzzzzzzzz',
                                'name' => 'ticket',
                                'quantity' => (int)$validatedData['quantity']  // Ensure quantity is an integer
                            ]
                        ],
                        'payment_method_types' => ['gcash'],
                        'cancel_url' => 'http://127.0.0.1:8000/cancel',
                        'success_url' => 'http://127.0.0.1:8000/success',
                        'description' => 'checkout details zzzzzzzzzzzzzz'
                    ]
                ]
            ]),
            CURLOPT_HTTPHEADER => [
                "Content-Type: application/json",
                "accept: application/json",
                "authorization: Basic " . base64_encode(env('AUTH_PAY'))
            ],
        ]);

          $response = curl_exec($curl);
        $err = curl_error($curl);
        
        curl_close($curl);
        
        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $response_data = json_decode($response, true);
            
            $checkout_session_id = $response_data['data']['id'];
            Session::put('checkout_session_id', $checkout_session_id);
            
            $checkout_url = $response_data['data']['attributes']['checkout_url'];
            
            return redirect()->away($checkout_url);
        }
    }
    


    

    public function success()
    {
        // Retrieve the checkout session ID from the session
        $checkout_session_id = Session::get('checkout_session_id');
    
        if (!$checkout_session_id) {
            return response()->json(['error' => 'No checkout session ID found'], 400);
        }
    
        $curl = curl_init();
    
        curl_setopt_array($curl, [
            CURLOPT_URL => "https://api.paymongo.com/v1/checkout_sessions/{$checkout_session_id}",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => [
                "accept: application/json",
                "authorization: Basic " . base64_encode(env('AUTH_PAY'))
            ],
        ]);
    
        $response = curl_exec($curl);
        $err = curl_error($curl);
    
        curl_close($curl);
    
        if ($err) {
            return response()->json(['error' => "cURL Error: $err"], 500);
        }
    
        $data = json_decode($response, true);
        
        if (!isset($data['data']['attributes']['payments'][0]['attributes']['status'])) {
            return response()->json(['error' => 'Invalid response from PayMongo'], 500);
        }
    
        // Extract important details
        $checkoutDetails = $data['data']['attributes'];
$paymentDetails = $checkoutDetails['payments'][0]['attributes'];
$lineItem = $checkoutDetails['line_items'][0];

// Prepare payment data
$paymentData = [
    'checkout_session_id' => $data['data']['id'],
    'amount' => $paymentDetails['amount'],
    'paid_at' => Carbon::createFromTimestamp($paymentDetails['paid_at']),
    'status' => $checkoutDetails['status'],
    'payment_method' => $paymentDetails['source']['type'],
    'name' => $checkoutDetails['billing']['name'],
    'email' => $checkoutDetails['billing']['email'],
    'phone' => $checkoutDetails['billing']['phone'],
    'description' => $checkoutDetails['description'],
    'item_name' => $lineItem['name'],
    'quantity' => $lineItem['quantity'],
    'currency' => $paymentDetails['currency'],
    'fee' => $paymentDetails['fee'],
    'net_amount' => $paymentDetails['net_amount']
];


// Use updateOrCreate to efficiently handle both new and existing records
$payment = PaymentTransaction::updateOrCreate(
    ['checkout_session_id' => $data['data']['id']],
    $paymentData
);

            // Prepare to send to TicketController
         $ticketData = $paymentData;
         $ticketData['payment'] = $paymentData['status'];
         unset($ticketData['checkout_session_id'], $ticketData['status']);
        return app(TicketController::class)->store(new Request($ticketData));
    }


    
    public function cancel()
    {
        $checkout_session_id = Session::get('checkout_session_id');
        if (!$checkout_session_id) {
            return response()->json(['error' => 'No checkout session ID found'], 400);
        }
        
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => "https://api.paymongo.com/v1/checkout_sessions/{$checkout_session_id}/expire",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_HTTPHEADER => [
                "accept: application/json",
                "authorization: Basic " . base64_encode(env('AUTH_PAY'))  // Make sure to use environment variable
            ],
        ]);
        
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        
        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            echo $response;
        }
    }

}