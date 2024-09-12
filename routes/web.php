<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('layouts.admin'); 
});

Route::get('/', function(){
    return view('user.index');
});

Route::get('/admin/login', [LoginController::class, 'showloginform'])->name('index');
Route::get('/login', [LoginController::class, 'showloginform'])->name('login');
// Route::post('/login', [AdminController::class, 'login'])->name('login');
// /var/www/html/LaraAdminLTE/resources/views/admin/auth/index.blade.php