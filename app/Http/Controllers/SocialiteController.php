<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Oauth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use DB;

class SocialiteController extends Controller
{
    public function googleredirect()
    {
        return Socialite::driver('google')->stateless()->redirect();
    }

    public function googlecallback()
    {
        $userdata = Socialite::driver('google')->stateless()->user();
        // dd($userdata);
        $user = User::where('email', $userdata->email)->where('social_type', 'google')->first();
        if($user)
        {
            Auth::login($user);
            return redirect('/dashboard');

        }

        else{

             $uuid = Str::uuid()->toString();
             $user = new User();
             $user->name = $userdata->name;
             $user->email = $userdata->email;
             $user->password = Hash::make($uuid.now());
             $user->social_type = 'google';

             $user->save();
             return redirect('/dashboard');
        }
    }

    public function facebookredirect()
    {
        return Socialite::driver('facebook')->stateless()->redirect();
    }

    public function facebookcallback()
    {
        $userdata = Socialite::driver('facebook')->stateless()->user();
        // dd($userdata);
        $user = User::where('email', $userdata->email)->where('social_type', 'facebook')->first();
        if($user)
        {
            Auth::login($user);
            return redirect('/dashboard');

        }

        else{

             $uuid = Str::uuid()->toString();
             $user = new User();
             $user->name = $userdata->name;
             $user->email = $userdata->email;
             $user->password = Hash::make($uuid.now());
             $user->social_type = 'facebook';

             $user->save();
             return redirect('/dashboard');
        }
    }
}
