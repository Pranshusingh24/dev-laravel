<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\registerController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// require__DIR__.'/auth.php';

Route::get('/', function () {
    return view('welcome');
    
});

// // get method Register User  page 
// Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
// Route::post('/register', [RegisterController::class, 'register']);

// // get method view page me data get ke liye use hota hay  
// Route::get('/admin', [LoginController::class, 'index'])->name('admin');
// // post menthod ka use kisi form ka data DB me bhejna hota hay 
// Route::post('/login', [LoginController::class, 'showloginform'])->name('login');

// // Redirect Dashboard page route 
// Route::get('/dashboard', [DashboardController::class, 'viewDashboard'])->name('dashboard');
// // Logout page route 
// Route::get('/logout', [DashboardController::class, 'logout'])->name('logout');

// We are start to create new reutes for Auth system 
    // we are useing 'match' method for call both method "Get & Post" (1 se jyada method ka use ho rha ho to 'any' ka use karte sakte hay)
//    Route::match(["get", "post"], 'register', [AuthController::class, 'register'])->name('register'); 

   Route::any( 'register', [AuthController::class, 'register'])->name('register'); 
   
    // we are useing 'match' method for call both method "Get & Post"
   Route::match(["get", "post"], 'login', [AuthController::class, 'login'])->name('login'); 

    //Forget password create with post method 
   Route::any( 'forgetpassword', [AuthController::class, 'forgetpassword'])->name('forgetpassword'); 
    //Step of Forget password create with post method 
   Route::any( 'stepforgetpassword', [AuthController::class, 'stepforgetpassword'])->name('stepforgetpassword');
    //reset password route 
   Route::any( 'resetpassword{token}', [AuthController::class, 'resetpassword'])->name('resetpassword'); 

    Route::group([
        // "['middleware'  => ['auth'] ]" ka use widhout login not able to access these are Routes 
    'middleware'  => ['auth'] ], function(){
        Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard');

        // we are useing 'match' method for call both method "Get & Post"
        Route::match(["get", "post"], 'profile', [AuthController::class, 'profile'])->name('profile'); 

        Route::get('logout', [AuthController::class, 'logout'])->name('logout');
    });