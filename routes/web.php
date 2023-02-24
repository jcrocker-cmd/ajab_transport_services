<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SigninController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AddCarController;
use App\Http\Controllers\SocialiteController;
use App\Http\Controllers\UserinfoController;
use App\Http\Controllers\AdminphotoController;
use App\Http\Controllers\AdmininfoController;
use App\Http\Controllers\EmailRequestController;
use App\Http\Controllers\BookingformsController;


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
// Route::post('/login', [LoginController::class,'save']);
Route::post('/checklogin', [LoginController::class,'checklogin']);
Route::post('/adminchecklogin', [AdmininfoController::class,'adminchecklogin']);


Route::get('/dd', function () {
    return view('main.email-template');
});




// Dashboard Routes

Route::middleware(['preventBackHistory'])->group(function () {

    Route::middleware(['admin-already-loggedin'])->group(function () {
        Route::get('/dashboard-login', [AdmininfoController::class,'loginroute']); 
    });

    Route::middleware(['admin-auth-checking'])->group(function () {

        Route::get('/dashboard', [AdmininfoController::class,'dashboardroute']);
        Route::get('/editcar', function () {
            return view('dashboard.editcar');
        });

        Route::get('/allusers', [UserinfoController::class,'db_allusers']);
        Route::get('/all-vehicles', [AddCarController::class,'db_allvehicles']);
        Route::get('/rented', [AddCarController::class,'db_rentedcars']);
        Route::get('/delete_car/{id}', [AddCarController::class,'delete_car'])->name('delete_car');
        Route::get('/viewcar/{id}', [AddCarController::class,'db_viewvehicle']);
        Route::get('/editcar/{id}', [AddCarController::class,'db_editcar']);
        Route::put('/updatecar/{id}', [AddCarController::class,'db_updatecar']);
        Route::get('/settings', [AdmininfoController::class,'admin_account_settings_route']);
        Route::post('/addcar', [AddCarController::class,'save']);
        Route::put('/adminpp_update/{id}', [AdmininfoController::class,'adminpp_update']);
        Route::put('/admininfo_update/{id}', [AdmininfoController::class,'admininfo_update']);
        Route::put('/adminpassword_update/{id}', [AdmininfoController::class,'adminpassword_update']);
        Route::get('/add', [AddCarController::class,'addcar_route']);
        Route::get('/notification', [AddCarController::class,'db_notification']);
    });



    Route::get('/adminlogout', [AdmininfoController::class,'adminlogout']);
});



// Home Routes
Route::middleware(['preventBackHistory'])->group(function () {

    Route::get('/', function () {
        return view('home.homepage');
    });

    Route::post('/email', [EmailRequestController::class, 'sendEmail'])->name('send.email');

    Route::middleware(['user-already-loggedin'])->group(function () {
        Route::get('/log-in', [LoginController::class,'loginroute']);   
        Route::get('/sign-in', [SigninController::class,'signinroute']);
        
    });




// Main Routes


    Route::middleware(['user-auth-checking'])->group(function () {
        Route::get('/mainhome', [AddCarController::class,'main_allcars']);
        Route::get('/mainviewcar/{id}', [AddCarController::class,'main_viewvehicle']);
        Route::get('/account', [UserinfoController::class,'user_accountroute']);
        Route::get('/payment-method', [BookingformsController::class,'payment_methodroute']);
        Route::get('/bookingforms/{id}', [UserinfoController::class,'booking_route']);
        Route::post('/bookingformsubmit/{id}', [BookingformsController::class,'booking_submit'])->name('book.submit');
    });

Route::get('/logout', [LoginController::class,'logout']);

});



// Google Auth
Route::get('/auth/google/redirect', [SocialiteController::class, 'googleredirect']);
Route::get('/auth/google/callback', [SocialiteController::class, 'googlecallback']);

//Facebook Auth
Route::get('/auth/facebook/redirect', [SocialiteController::class, 'facebookredirect']);
Route::get('/auth/facebook/callback', [SocialiteController::class, 'facebookcallback']);

//Facebook Auth
Route::get('/auth/apple/redirect', [SocialiteController::class, 'appleredirect']);
Route::get('/auth/apple/callback', [SocialiteController::class, 'applecallback']);