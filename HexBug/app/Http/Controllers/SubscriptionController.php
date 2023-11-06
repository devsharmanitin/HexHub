<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubScription;

class SubscriptionController extends Controller
{
    //
    public function Subscriptionplans(){
        $plans = SubScription::orderBy("created_at")->get();
        $Context = [
            'plans' => $plans,
        ];
        return view('Subscriptions.Subscriptions' , $Context);
    }

    public function createsubscriptiontemp(){
        return view('Subscriptions.createusersubscription');
    }
    
    public function createSubScription(Request $request){
        $request->validate([
            'subscriptionName' => 'required',
            'subscriptionPrice' => 'required|max:5',
            'subscriptionTiming' => 'required|max:2',
            'subscriptionValidity' => 'required|max:5',
            'subscriptionDesc' => 'required|max:4000',       
        ]);
        // DD($request->subscriptionContent , $request->subscriptionPrice , $request->subscriptionName , $request->subscriptionTiming , $request->subscriptionValidity , $request->subscriptionDesc ,  "COntent");
            $subs = SubScription::create([
                'name' => $request->subscriptionName,
                'price' => $request->subscriptionPrice,
                'content' => $request->subscriptionContent,
                'timing' => $request->subscriptionTiming,
                'validity' => $request->subscriptionValidity,
                'is_active' => 1,
                'description' => $request->subscriptionDesc,
            ]);
            $subs->save();
            return redirect()->route('index')->with('success','Subscription Created Successfully');
        }


        
        public function updateSubScription(Request $request ,$SubScriptionId){
            $subscription = SubScription::find($SubScriptionId);
            
            if($request->subscriptionName){
            $subscription->name = $request->subscriptionName;
                }
            if($request->subscriptionPrice){
                $subscription->name = $request->subscriptionPrice;
                }
            if($request->subscriptionContent){
                $subscription->name = $request->subscriptionContent;
                }
            if($request->subscriptionTiming){
                $subscription->name = $request->subscriptionTiming;
                }
            if($request->subscriptionValidity){
                $subscription->name = $request->subscriptionValidity;
                }
            if($request->subscriptionDesc){
                $subscription->name = $request->subscriptionDesc;
                }
            $subscription->save();
            return redirect()->route('index')->with('success','Plan Updated Successfully');

        }

        public function deleteSubScription($subscriptionId){
            $SubScription = SubScription::find($subscriptionId);
            if($SubScription){
                $SubScription->delete();
                return redirect()->route('index')->with('success' , 'Plan Deleted Succesfully');
            }
            return redirect()->route('index')->with('error','Plan Not Found');
        }




    
}
