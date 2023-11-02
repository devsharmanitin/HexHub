<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StripeController extends Controller
{
    //

    public function checkout(){
        return view('payments.checkout');
    }


    public function StripeCheckOut(Request $request){

        \Stripe\Stripe::setApiKey(config('stripe.sk'));
        
        $productName = $request->get('productName');
        $productPrice  = $request->get('totalvalue');

        $session = \Stripe\Checkout\Session::create([
            'line_items'  =>  [
                [
                    'price_data' =>  [
                        'currency'      =>  'INR' ,
                        'product_data'  =>  [
                            'name' => $productName,
                        ],
                        'unit_amount'   => $productPrice,
                    ],
                    'quantity'   =>  1,
                ],
            ],
            'mode' => 'payment' , 
            'success_url' => route('success'),
            'cancel_url'  => route('Checkout'),
        ]);
        return redirect()->away($session->url);
    }

    public function success(){
        return "Payment Successfull";
    }

}
