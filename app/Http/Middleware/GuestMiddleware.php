<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class GuestMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if the session has 'loginId', indicating the user is logged in
        if (Auth::check()) {
            // Redirect the user to the main page if they are logged in
            return redirect('/home'); // or any other page you want
        }

        // Allow the guest to proceed if they are not logged in
        return $next($request);
    }
}
