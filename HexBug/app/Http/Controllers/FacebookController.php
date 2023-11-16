<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class FacebookController extends Controller
{
    //

    public function RedirectToFacebook(){
        return Socialite::driver('facebook')->redirect();
    }


    public function handleFacebookCallback(Request $request){
        try{

            $user = Socialite::driver('facebook')->user();
            DD($user);
        }catch(Exception $error){
            throw $error;
        }

    }
}
