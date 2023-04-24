<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Spatie\Permission\Models\Role;
use Hash;



class SigninController extends Controller
{
    public function signinroute()
    {
    return view('home.signin');
    }
    
    public function create_account_client(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|alphaNum|min:8',
            'bday' => 'required',
        ]);
    
        $user = $request->all();
        $user['social_type'] = 'AJAB Services';
        $user['password'] = Hash::make($user['password']);
        $newUser = User::create($user);
    
        $role = Role::where('name', 'Client')->first();
        $newUser->roles()->attach($role);
    
        if ($newUser) {
            Session::flash('successregister', 'You\'ve registered successfully, Try to LOG IN.');
            return redirect('/log-in');
        } else {
            return redirect('/sign-up')->with('failregister', 'Something is wrong');
        }
    }        

}
