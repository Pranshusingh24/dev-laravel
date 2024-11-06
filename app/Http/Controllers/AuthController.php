<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
// use Illuminate\Contracts\Validation\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Mail;
use App\Mail\ForgetPasswordMail;



// use function Laravel\Prompts\password;

// Cloud computing service providers: AWS, MICROSOFT AZURE, GOOGLE CLOUD
// Cloud Engineer Roles And Responsibilities: https://in.indeed.com/career-advice/finding-a-job/cloud-engineer-roles-and-responsibilities
// AWS Cloud Course: https://login.us-east-1.auth.skillbuilder.aws/login?scope=openid%20email%20profile&response_type=code&client_id=7ci5c0bl3n2646khir5nfa6ash&identity_provider=&redirect_uri=https://explore.skillbuilder.aws/manage/v1/openidconnect/code

class AuthController extends Controller
{
    public function register(Request $request){
        // get and post menthod se
     
        if($request-> isMethod('post')){
            // echo 'Hello Your are Registered';
    
         $request->validate([
                // "name" => "required|string",
                'name' => "required|string",
                'email' => "required|email|unique:users",
                'password' => "required",
                'password_confirmation' => "required",
            ]);

            // dd($dtata);
            // we are going to insert data under phpmyadmin database data 
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
                    return to_route('login');
                }
        }
        return view('Auth.register');
    }

    public function login(Request $request){
        // get and post menthod se 
            if ($request->isMethod('post')) {

            $request-> validate([
                'email'     => "required|email",
                'password'  => "required",
            ]);
            if(Auth::attempt([
                "email"     => $request-> email,
                "password"     => $request-> password
            ])){
                return to_route('dashboard');
            }else{
                return to_route('login')->with("error", "Invalid login details");
            }
        }
        return view('Auth.login');

    }

    public function dashboard(){
        // dashboard we can access 
        return view('dashboard');
    }

    public function profile(Request $request){
        // profile we can access 
        if($request-> isMethod('post')){
            // get user id by "auto use id"
            $id= auth()->user()->id;

            $user = User:: findOrFail($id);
            $user->name     = $request->name;
            $user->password = $request->password;
            $user->save();

            return to_route('dashboard')->with('success');
        }
        return view('profile');

    }

    public function logout(){
        // logout features 
        // session ke bad sigle ":" se user logout nhi hota hay 
        Session::flush();
        Auth::logout();
   
        return to_route('login');
    }
    // Learn Forget Password vedio :- https://www.youtube.com/watch?v=XiARKCj6Sgc&t=226s 
    public function forgetpassword(){
        // after forgetpassword
        return view('Auth.forgetform');
    }

    public function stepforgetpassword(Request $request) {
        // Validate email input
        $validater = Validator::make($request->all(), [
            'email' => "required|email|exists:users,email"
        ]);
    
        if ($validater->fails()) {
            return redirect()->route('stepforgetpassword')->withInput()->withErrors($validater);
        }
    
        // Generate a random token with a length of 60
        $token = Str::random(60);
    
        // Insert token into password reset table
        \DB::table('password_reset_tokens')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => now()
        ]);
    
        // Send Email Here
        $user = User::where('email', $request->email)->first();
    
        $formData = [
            'token' => $token,
            'user' => $user,
            'mailsub' => 'Request to reset your password',
        ]; // Add semicolon here
    
        // Send the reset password email
        Mail::to($request->email)->send(new ForgetPasswordMail($formData));
    
        return redirect()->route('forgetpassword')->with('success', 'Successfully changed your password');
    }

    public function resetpassword(){

    }
}






// forgetform
// http://www.swarnayurveda.com/
// swarnayurveda