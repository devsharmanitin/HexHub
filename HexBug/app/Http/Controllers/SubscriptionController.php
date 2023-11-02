<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubScription;

class SubscriptionController extends Controller
{
    //
    public function createsubscriptiontemp(){
        return view('Subscriptions.createusersubscription');
    }

    
    public function createSubScription(Request $request){
        $request->validate([
            'subscriptionName' => 'required',
            'subscriptionPrice' => 'required|max:5',
            'subscriptionContent' => 'required|max:2000',
            'subscriptionTiming' => 'required|max:2',
            'subscriptionValidity' => 'required|max:5',
            'subscriptionIsActive' => 'required|',
            'subscriptionDesc' => 'required|max:4000',       
        ]);
            $subs = SubScription::create([
                'name' => $request->subscriptionName,
                'price' => $request->subscriptionPrice,
                'content' => $request->subscriptionContent,
                'timing' => $request->subscriptionTiming,
                'validity' => $request->subscriptionValidity,
                'is_active' => $request->subscriptionIsActive,
                'description' => $request->subscriptionDesc,
            ]);
            $subs->save();
            return redirect()->route('index')->with('success','Subscription Created Successfully');
        }
    
}
