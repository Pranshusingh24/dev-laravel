<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request){
        // get and post menthod se
     
        if($request-> isMethod('post')){
            // dd($request->all());
            // echo 'Hello Your are Registered';
    
         $request->validate([
                // "name" => "required|string",
                'name' => "required|string",
                'email' => "required|email|unique:users",
                'password' => "required",
                'password_confirmation' => "required",
            ]);

            // dd($dtata);

            User::create([
                'name'                  => $request->name,
                'email'                 => $request->email,
                'password'              => bcrypt($request->password),
                // bcrypt() function ka use password ko encrept mode me bhejne ke liye use hota hay 
                'password_confirmation' => bcrypt($request->password_confirmation),
            ]);
                // Redirect Auth login Dashboard 
                if(Auth::attempt([
                    "email"     => $request-> email,
                    "password"     => $request-> password
                ])){
                    return to_route('dashboard');
                }
        }
        return view('Auth.register');
    }

    public function login(){
        // get and post menthod se 
        return view('Auth.login');

    }

    public function dashboard(){
        // after login we can access 
        return view('dashboard');
    }

    public function profile(){
        // after login we can access 
        return view('profile');

    }

    public function logout(){
        // after login we can access 

    }
}
