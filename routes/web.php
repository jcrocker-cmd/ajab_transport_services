<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SigninController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SocialiteController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::post('/signin', [SigninController::class, 'save'])->name('signin.save');
Route::post('/login', [LoginController::class,'save']);

Route::get('/welcome', function () {
    return view('welcome');
});
Route::get('/', function () {
    return view('main.index');
});
Route::get('/dashboard', function () {
    return view('dashboard.dashboard');
});
Route::get('/log-in', function () {
    return view('main.login');
});
Route::get('/sign-in', function () {
    return view('main.signin');
});

Route::get('/nav', function () {
    return view('main.layout.header');
});
Route::get('/footer', function () {
    return view('main.layout.footer');
});
Route::get('/footer2', function () {
    return view('main.layout.footer2');
});


// Google Auth
Route::get('/auth/google/redirect', [SocialiteController::class, 'googleredirect']);
Route::get('/auth/google/callback', [SocialiteController::class, 'googlecallback']);

//Facebook Auth
Route::get('/auth/facebook/redirect', [SocialiteController::class, 'facebookredirect']);
Route::get('/auth/facebook/callback', [SocialiteController::class, 'facebookcallback']);