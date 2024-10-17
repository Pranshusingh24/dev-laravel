<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function viewDashboard(){
        return view('dashboard.dashboard');
    }

    // Logout function for session flush Auth logout     
    public function logout(Request $request)
    {
        Session::flush();
        Auth::logout();
        return Redirect('/admin');
    }
}