<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    // index function for show login form in admin route
    public function index()
    {
        return view('admin.login');
    }


    // showloginform function and loged in 
    public function showloginform(Request $request)
    {
        // dd($request);
       // validate request is 
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        // ramji@gmail.com
        // bijop@mailinator.com
        
        // file name fill 
        $pranshucrdtal = $request->only('email', 'password');
    
        
        // In Laravel, the Auth::attempt() method is used to verify the user's credentials
        if (Auth::attempt($pranshucrdtal)) {
            // validate for Rdirect 
            return redirect()->intended(route('dashboard'))
                        ->withSuccess('You have Successfully login');
        }else{
           return redirect('/admin');
        }

    }

    // logout function
    public function logout(Request $request)
    {
        Session::flush();
        Auth::logout();
        return Redirect('/admin');
    }
}
