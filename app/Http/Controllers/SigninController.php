<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Signin;


class SigninController extends Controller
{
    function save(Request $request)
    {
        $signin = new Signin();
        $signin ->fname = $request->input('fname');
        $signin ->lname = $request->input('lname');
        $signin ->email = $request->input('email');
        $signin ->password = $request->input('password');
        $signin ->bday = $request->input('bday');
        $signin ->country = $request->get('country');
        $signin ->gender = $request->input('gender');
        $signin ->save();
        return redirect()->back();
        

    }
}
