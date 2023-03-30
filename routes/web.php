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

Route::post('/signin', [SigninController::class, 'signin_save'])->name('signin.save');
Route::post('/checklogin', [LoginController::class,'checklogin']);
Route::post('/adminchecklogin', [AdmininfoController::class,'adminchecklogin']);


Route::get('/dd', function () {
    return view('main.email-template');
});




// Dashboard Routes

Route::middleware(['preventBackHistory'])->group(function () {

    Route::middleware(['guest'])->group(function () {
        Route::get('/dashboard-login', [AdmininfoController::class,'loginroute']); 
    });

    Route::middleware(['auth'])->group(function () {

        Route::get('/dashboard', [AdmininfoController::class,'dashboardroute']);

        // RENTED ROUTES
        Route::get('/rented', [AddCarController::class,'db_rentedcars']);
        Route::get('/rented/{id}/ajaxview', [AddCarController::class,'db_rented_ajaxview']);

        Route::get('/available', [AddCarController::class,'db_availablecars']);
        Route::get('/all-vehicles', [AddCarController::class,'db_allvehicles']);
        Route::get('/settings', [AdmininfoController::class,'admin_account_settings_route']);
        Route::get('/notification', [AddCarController::class,'db_notification']);

        // ADMIN ROUTES
        Route::put('/adminpp_update', [AdmininfoController::class,'adminpp_update']);
        Route::put('/admininfo_update', [AdmininfoController::class,'admininfo_update']);
        Route::put('/adminpassword_update', [AdmininfoController::class,'adminpassword_update']);

        // USER MANAGEMENT
        Route::get('/user/management', [AdmininfoController::class,'user_management_route']);
        Route::post('/create-user-role', [AdmininfoController::class,'create_user_role']);

        // CAR ROUTES
        Route::get('/add', [AddCarController::class,'addcar_route']);
        Route::post('/addcar', [AddCarController::class,'save']);
        Route::get('/delete_car/{id}', [AddCarController::class,'delete_car'])->name('delete_car');
        Route::get('/viewcar/{slug}', [AddCarController::class,'db_viewvehicle'])->name('dashboard.viewcar');
        Route::get('/editcar/{slug}', [AddCarController::class,'db_editcar']);
        Route::put('/updatecar/{slug}', [AddCarController::class,'db_updatecar']);

        // INQUIRY ROUTES
        Route::get('/inquiry', [EmailRequestController::class,'db_inquiry']);
        Route::get('/delete_inquiry/{id}', [EmailRequestController::class,'db_inquiry_delete']);
        Route::get('/inquiry/{id}/ajaxview', [EmailRequestController::class,'db_inquiry_ajaxview']);

        // BOOKINGS ROUTES
        Route::get('/bookings', [BookingformsController::class,'db_bookings']);
        Route::get('/delete_booking/{id}', [BookingformsController::class,'db_booking_delete']);
        Route::get('/bookings/{id}/ajaxview', [BookingformsController::class,'db_booking_ajaxview']);
        Route::post('/confirm_booking/{id}', [BookingformsController::class, 'confirmBooking'])->name('confirm.booking');
        Route::patch('/decline_booking/{id}', [BookingformsController::class, 'declineBooking']);
        Route::patch('/cancel_booking/{id}', [BookingformsController::class, 'cancelBooking']);

        // CLIENTS ROUTES
        Route::get('/allusers', [UserinfoController::class,'db_allusers']);
        Route::get('/delete_user/{id}', [UserinfoController::class,'db_user_delete']);
        Route::get('/delete_account/{id}', [UserinfoController::class,'delete_user']);
        Route::get('/user/{id}/ajaxview', [UserinfoController::class,'db_user_ajaxview']);

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

        Route::get('/cars/search', [AddCarController::class,'main_search_rental'])->name('car.search');

        Route::get('/mainhome', [AddCarController::class,'main_allcars']);
        Route::get('/mainviewcar/{slug}', [AddCarController::class,'main_viewvehicle']);

        Route::get('/account', [UserinfoController::class,'user_accountroute']);
        Route::get('/account/{id}/ajaxview', [UserinfoController::class,'user_booking_ajaxview']);
        Route::get('/account-info/{id}/ajaxedit', [UserinfoController::class,'user_account_ajaxedit']);
        Route::put('/account-info-update', [UserinfoController::class, 'user_account_info_update'])->name('account-info-update');

        Route::get('/bookingforms/{slug}', [BookingformsController::class,'booking_route']);
        Route::post('/bookingformsubmit/{slug}', [BookingformsController::class,'booking_submit'])->name('book.submit');
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
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();   

Route::get('/welcome', function () {
    return view('home.welcome');
});


