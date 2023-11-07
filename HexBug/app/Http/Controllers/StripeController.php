<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Models\SubScription;
use App\Models\UserSubscription;
use Illuminate\Support\Carbon;

class StripeController extends Controller
{
    //

    public function checkout($id){
        $subscription = SubScription::where("id",$id)->first();
        return view('payments.checkout',['plan'=> $subscription]);  
    }


    public function StripeCheckOut(Request $request , $id ){
        try{
            $sub = SubScription::where('id',$id)->first();
        }
        catch(Exception $e){
            return redirect()->back()->with('error','SubScription Not Found');
        }

        \Stripe\Stripe::setApiKey(config('stripe.sk'));
        
        $productName = $sub->name;
        $productPrice  = $sub->price;

        $session = \Stripe\Checkout\Session::create([
            'line_items'  =>  [
                [
                    'price_data' =>  [
                        'currency'      =>  'INR' ,
                        'product_data'  =>  [
                            'name' => $productName,
                        ],
                        'unit_amount'   => $productPrice*100,
                    ],
                    'quantity'   =>  1,
                ],
            ],
            'mode' => 'payment' , 
            'success_url' => route('success', ['id' => $id]),
            'cancel_url'  => route('index' ),
            
           
        ]);
        return redirect()->away($session->url); // Redirect user to payment page
         
    }


    private function updateSubscriptionDB($id){
        $sub = SubScription::where('id',$id)->first();

            // Check if the user already has an active subscription for this product
            $existingSubscription = UserSubscription::where([
                'user_id' => auth()->user()->id,
                'subscription_id' => $sub->id,
                'is_active' => 1,
            ])->first();

            if (!$existingSubscription) {
                $currentDateTime = Carbon::now();
                if($sub) {
                    $newSub = UserSubscription::create([
                        'user_id' => auth()->user()->id ,
                        'subscription_id' => $sub->id,
                        'purchase_date' =>  $currentDateTime->toDateTimeString(),
                        'is_active' => 1 ,
                    ]);
                    $newSub->save();
                    return ;
                }
            }
            return;
    }

    // public function handlewebhook(Request $request){
    //     require 'vendor/autoload.php';

    //     // The library needs to be configured with your account's secret key.
    //     // Ensure the key is kept out of any version control system you might be using.
    //     $stripe = new \Stripe\StripeClient(config('services.stripe.secret'));

    //     // This is your Stripe CLI webhook secret for testing your endpoint locally.
    //     $endpoint_secret = 'we_1O9TI8SEgI2391x6Xo6h6Ho5';

    //     $payload = @file_get_contents('php://input');
    //     $sig_header = $_SERVER['HTTP_STRIPE_SIGNATURE'];
    //     $event = null;
          
 
    //     print_r("Handle Webhook");


        
    //     try {
    //     $event = \Stripe\Webhook::constructEvent(
    //         $payload, $sig_header, $endpoint_secret
    //     );
    //     } catch(\UnexpectedValueException $e) {
    //     // Invalid payload
    //     http_response_code(400);
    //     exit();
    //     } catch(\Stripe\Exception\SignatureVerificationException $e) {
    //     // Invalid signature
    //     http_response_code(400);
    //     exit();
    //     }

    //     // Handle the event
    //     switch ($event->type) {
    //     case 'checkout.session.completed':
    //         $paymentIntent = $event->data->object;
    //     // ... handle other event types
    //         $subscriptionId  = $event->data->object->metadata['subscriptionId'];
    //         $sub = SubScription::where('id',$subscriptionId)->first();

    //         // Check if the user already has an active subscription for this product
    //         $existingSubscription = UserSubscription::where([
    //             'user_id' => auth()->user()->id,
    //             'subscription_id' => $sub->id,
    //             'is_active' => 1,
    //         ])->first();

    //         if (!$existingSubscription) {
    //             $currentDateTime = Carbon::now();
    //             if($sub) {
    //                 $newSub = UserSubscription::create([
    //                     'user_id' => auth()->user() ,
    //                     'subscription_id' => $sub->id,
    //                     'purchase_date' => $currentDateTime->format('Y-m-d H:i:s') ,
    //                     'is_active' => 1 ,
    //                 ]);
    //                 $newSub->save();
    //                 return redirect()->route('success')->with('success' , 'Purchase Successful');
    //             }

    //         }

    //     default:
    //         echo 'Received unknown event type ' . $event->type;
    //     }

    //     http_response_code(200);
    // }

    public function success(Request $request , $id){
        
            // Payment was successful, update your database
            $this->updateSubscriptionDB($id);
            return redirect()->route('index')->with('success', 'Purchase Successful');
       
        
    }

}
