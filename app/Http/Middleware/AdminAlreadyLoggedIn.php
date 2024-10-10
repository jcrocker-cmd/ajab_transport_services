<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminAlreadyLoggedIn
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if the user is authenticated
        if (Auth::check() && $request->is('dashboard-login')) {
            // Redirect authenticated users to the dashboard if they attempt to access the login page
            return redirect('/dashboard');
        }

        return $next($request);
    }
}