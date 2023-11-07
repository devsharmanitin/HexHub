<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Post;
use App\Models\UserSubscription;


class AuthController extends Controller
{
    //  check for unauthenticated user and aplied the guest middleware 
    // public function __construct(){
    //     $this->middleware('guest')->except([
    //         'logout' , 'index'
    //     ]);
    // }


    
    // Show add user data template 
    public function addRequestUser($id){
        if(Auth::Check()){
            // $request_user = auth()->user();
            $user = User::find($id);
            $posts = Post::find($user->id);
            return view('profile.addprofile' , ['user'=>$user]);
            }
        else{
            return redirect()->route('login');  
        }
    }


    // Add User Data To Db 
    public function addRequestUserdb(Request $request , $id){
        if(Auth::Check()){
            $user = User::find($id);

            $request->validate([
                'username' => 'required|max:20',
                'status' => 'required',
                'address' => 'required' , 
                'image' => 'mimes:jpeg,jpg,png,gif|required|max:10000', // validate Descriptions
                'fullname' => 'required|max:500',
                'email' => 'required|regex:/(.+)@(.+)\.(.+)/i',
                'number' => ['required', 'regex:/^\d{10}$/'],
                'gender' => 'required|max:500',
                'github' => 'max:1000',
                'facebook' => 'max:100',
                'instagram' => 'max:1000',
            ]);

            // DD("VAlidation Successful" , $request->image);
            $imagePath = str_replace('public/', '', $request->file('image')->store('public/images/profilepic'));

            $user->image = $imagePath;
            $user->email = $request->email;
            $user->status = $request->status;
            $user->number = $request->number;
            $user->gender = $request->gender;
            $user->name = $request->fullname;
            $user->address = $request->address;
            $user->username = $request->username;
            if ($request->github){
                $user->github = $request->github;
            }
            if ($request->facebook){
                $user->facebook = $request->facebook;
            }
            if ($request->instagram){
                $user->instagram = $request->instagram;
            }
            $user->save();
            return redirect()->route('index');
            }
        else{
            return redirect()->route('login');  
        }
    }


    // User Profile 
    public function RequestUser(){
        if(Auth::Check()){
            $request_user = auth()->user();
            $user_id = $request_user->id;
            $posts = Post::Where('author_id' , $user_id)->get();
            $followers = $request_user->follower;
            $followings = $request_user->following;
            $currentDateTime = Carbon::now();
            $plans = UserSubscription::where([
                'user_id' => auth()->user()->id,
                'is_active' => 1,
            ])->where('purchase_date' , '<=' , $currentDateTime->toDateTimeString())->get();
            // Calculate the sum of 'amount' for records where 'status' is 'completed'
            $totalsubscriptions = auth()->user()->subscriptions;
            // DD($totalsubscriptions);
            $totalAmountSpent = 0;
            foreach ($totalsubscriptions as $sub) {
                $totalAmountSpent += intval($sub->subscriptions['price']);
                }
            return view('profile.userprofile' , ['user'=>$request_user , 'posts'=>$posts , 'followers'=>$followers , 'followings'=>$followings , 'plans'=>$plans , 'spentamount'=>$totalAmountSpent]);
            }
        else{
            return redirect()->route('login');  
        }
    }


    // Return user to Reister Page
    public function RegisterController(){
        return view('auth.register');
    }


    //  Get Data from Register Page & Create User
    public function CreateUser(Request  $request){
        // get Data from user 
        $request->validate([
            'name' => 'required|string|max:250',
            'email' => 'required|email|max:40|unique:users',
            'password' => 'required|min:8|max:16|confirmed'
        ]);

        // create User 
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        // For Login after registration 
        $credientials = $request->only('email' , 'password');
        $AuthResponse =Auth::attempt($credientials);   # return True or False
        if ($AuthResponse == true){
            $request->session()->regenerate();
            return redirect()->route('index')
                ->withSuccess('You have successfully registered & logged in!');
        } else{
            return redirect()-> route('Login')
                ->withErrors(['error' => 'Incorrect Credientials ! Try Again']);
        }
    }


    // return to login Page to get credientials 
    public function LoginController(){
        return view('auth.login');
    }


    // Authenticate login credientials 
    public function authenticate(Request $request){
        $credientials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credientials)){
            $request->session()->regenerate();
            return redirect()->route('index')
                ->withSuccess('Login Successful');
        } 
        return back()->withErrors([
                'email'=> 'Your provided credentials do not match in our records.',
        ])->onlyInput('email');
    }


    


    // Logout 
    public function  LogOutController(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')
            ->withSuccess('Logout Successful');
    }




    // 
    
    



// Close The AuthController
}
