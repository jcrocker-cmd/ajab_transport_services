<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Signin;
use Illuminate\Support\Facades\Session;
use Hash;



class SigninController extends Controller
{
        public function signinroute()
        {
        return view('home.signin');
        }
        function save(Request $request)
        {
        $request->validate([
            'fname'=>'required',
            'lname'=>'required',
            'email'=>'required|email|unique:signins',
            'password'=>'required|alphaNum|min:8',
            'bday'=>'required'
        ]);

        $signin = new Signin();
        $signin ->fname = $request->input('fname');
        $signin ->lname = $request->input('lname');
        $signin ->email = $request->input('email');
        $signin ->password = Hash::make($request->input('password'));
        $signin ->bday = $request->input('bday');
        $signin ->gender = $request->input('gender');
        $signinsave = $signin ->save();
        if ($signinsave) {
            Session::flash('successregister','You`ve registered successfully, Try to LOG IN.');
            return redirect('/log-in');
        } else {
            return view('dashboard.dashboard')->with('failregister','Something is wrong');
        }
        
        
        

    }
    public function signin_users()
    {
        $signin = Signin::all();
        return view ('dashboard.viewuser')->with('signin', $signin);
    }
}
