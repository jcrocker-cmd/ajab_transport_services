<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Signin;
use Hash;
use Session;
use Auth;


class LoginController extends Controller
{
   public function loginroute()
   {
      return view('home.login');
   }


   public function logout()
   {
      Auth::logout();
      return redirect('/log-in');
     }
}
