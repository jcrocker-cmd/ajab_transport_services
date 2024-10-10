<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    // protected function authenticated(Request $request, $user)
    // {
    //     if ($user->hasAnyRole(['Super-Admin','Admin','Front-Desk'])) {
    //         return redirect('/dashboard');
    //     } elseif ($user->hasRole('Client')) {
    //         $user->update(['is_active' => true]); // Update the is_active attribute
    //         return redirect('home');
    //     }
    // }

    protected function authenticated(Request $request, $user)
    {
        // Check if the user's email is verified
        if (!$user->hasVerifiedEmail()) {
            // Redirect the user to the email verification page if not verified
            return redirect()->route('auth.verify');
        }

        // Check for roles and redirect based on user role
        if ($user->hasAnyRole(['Super-Admin', 'Admin', 'Front-Desk'])) {
            return redirect('/dashboard');
        } elseif ($user->hasRole('Client')) {
            $user->update(['is_active' => true]); // Update the is_active attribute
            return redirect('home');
        }
    }

}
