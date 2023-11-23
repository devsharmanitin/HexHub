<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class GoogleController extends Controller
{
    //

    public function RedirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback(Request $request)
    {
        try {
            // Retrive User from Socialite Google 
            $user = Socialite::driver('google')->user();

            // Check If User Exixts in my Db or Not 
            $is_user = User::where('email', $user->getEmail())->first();

            // If User Not Exists Than (Update/Save) Method 
            if (!$is_user) {
                $saveUser = User::updateOrCreate(
                    [
                        'google_id' => $user->getId(),
                    ],
                    [
                        'name' => $user->getName(),
                        'email' => $user->getEmail(),
                        'password' => Hash::make($user->getName() . '@' . $user->getId() . '#' . $user->getEmail()),
                    ]
                );
            } else {
                // Update User Id Into Db 
                $saveUser = User::where(
                    'email',
                    $user->getEmail()
                )->update([
                    'google_id' => $user->getId(),
                ]);
                $saveUser = User::where('email', $user->getEmail())->first();
            }

            // Login Using id 
            Auth::loginUsingId($saveUser->id, 'true');
            $request->session()->regenerate();           // Regenerate Session 
            return redirect()->route('index')->with('success', 'Sign Up Successfully');
        } catch (Exception $error) {
            throw $error;
        }
    }
}
