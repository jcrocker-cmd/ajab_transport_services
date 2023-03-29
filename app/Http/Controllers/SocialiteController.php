<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Oauth;
use App\Models\Signin;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use DB;
use Session;

class SocialiteController extends Controller
{
    public function googleredirect()
    {
        return Socialite::driver('google')->stateless()->redirect();
    }

    public function googlecallback(Request $request)
    {
        
        $userdata = Socialite::driver('google')->stateless()->user();
        // dd($userdata);
        $user = Signin::where('email', $userdata->email)->where('social_type', 'google')->first();
        if($user)
        {
            $request->session()->put('loginId',$user->id);
            return redirect('/mainhome');

        }

        else{

            $uuid = Str::uuid()->toString();
            $user = new Signin();
            $user->first_name = $userdata->user['given_name'];
            $user->last_name = $userdata->user['family_name'];
            $user->email = $userdata->email;
            $user->password = Hash::make($uuid.now());
            $user->social_type = 'google';
            $user->picture = $userdata->user['picture'];
            // $avatar = file_get_contents($user->picture);
            $user->save();
            $request->session()->put('loginId',$user->id);
            return redirect('/mainhome');
        }
    }

    public function facebookredirect()
    {
        return Socialite::driver('facebook')->stateless()->redirect();
    }

    public function facebookcallback(Request $request)
    {
        $userdata = Socialite::driver('facebook')->stateless()->user();
        // dd($userdata);
        $user = Signin::where('email', $userdata->email)->where('social_type', 'facebook')->first();
        if($user)
        {
            $request->session()->put('loginId',$user->id);
            return redirect('/mainhome');

        }

        else{

            $uuid = Str::uuid()->toString();
            $user = new Signin();
            $user->first_name = $userdata->user['given_name'];
            $user->last_name = $userdata->user['family_name'];
            $user->email = $userdata->email;
            $user->password = Hash::make($uuid.now());
            $user->social_type = 'facebook';
            $user->save();
            $request->session()->put('loginId',$user->id);
            return redirect('/mainhome');
        }
    }

    public function appleredirect()
    {
        return Socialite::driver('apple')->stateless()->redirect();
    }

    public function applecallback(Request $request)
    {
        $userdata = Socialite::driver('apple')->stateless()->user();
        // dd($userdata);
        $user = User::where('email', $userdata->email)->where('social_type', 'apple')->first();
        if($user)
        {
            Auth::login($user);
            $request->session()->put('loginId',$user->id);
            return redirect('/mainhome');

        }

        else{

            $uuid = Str::uuid()->toString();
            $user = new User();
            $user->first_name = $userdata->user['given_name'];
            $user->last_name = $userdata->user['family_name'];
            $user->email = $userdata->email;
            $user->password = Hash::make($uuid.now());
            $user->social_type = 'google';
            $user->save();
            $request->session()->put('loginId',$user->id);
            return redirect('/mainhome');
        }
    }

    
    public function socialite_users()
    {
        $socialite = Signin::all();
        return view ('dashboard.viewuser')->with('socialite', $socialite);
    }

}

// $avatar = file_get_contents($user->avatar_original);
// Storage::put('images/'.$user->id.'.jpg', $avatar);