<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function showloginform()
    {
        return view('admin.auth.login');
        // this is view path :- /var/www/html/LaraAdminLTE/resources/views/admin/auth/login.blade.php
    }
    public function login(Request $request){
        dd($request->all());
    }
}
