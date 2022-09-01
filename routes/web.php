<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SigninController;
use App\Http\Controllers\LoginController;

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
Route::get('/log-in', function () {
    return view('main.layout.body.login');
});
Route::get('/sign-in', function () {
    return view('main.layout.body.signin');
});
Route::get('/terms', function () {
    return view('main.layout.body.terms');
});
Route::get('/nav', function () {
    return view('main.layout.header');
});