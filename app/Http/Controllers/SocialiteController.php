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
use Spatie\Permission\Models\Role;


class SocialiteController extends Controller
{
    public function googleredirect()
    {
        return Socialite::driver('google')->stateless()->redirect();
    }

    public function googlecallback(Request $request)
    {
        $userdata = Socialite::driver('google')->stateless()->user();
    
        // Get the user's profile picture URL
        $pictureUrl = str_replace('s96-c', 's0', $userdata->avatar);
        // Replace "s96-c" with "s0" to get the original size image
    
        $user = User::where('email', $userdata->email)->where('social_type', 'google')->first();
    
        if ($user) {
            Auth::login($user);
            if (!$user->is_active) {
                $user->update(['is_active' => true]);
            }
            return redirect('home');
        } else {
            $uuid = Str::uuid()->toString();
            $user = User::create([
                'first_name' => $userdata->user['given_name'],
                'last_name' => $userdata->user['family_name'],
                'email' => $userdata->email,
                'password' => Hash::make($uuid . now()),
                'social_type' => 'google',
                'profile_picture' => $pictureUrl, // Use the modified picture URL
            ]);

            $clientRole = Role::where('name', 'Client')->first();
            $user->roles()->attach($clientRole);
    
            Auth::login($user);
            return redirect('home');
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

        // Get the user's profile picture URL
        // Replace "s96-c" with "s0" to get the original size image

        $user = User::where('email', $userdata->email)->where('social_type', 'facebook')->first();

        if ($user) {
            Auth::login($user);
            return redirect('home');
        } else {
            $uuid = Str::uuid()->toString();
            $pictureUrl = str_replace('s96-c', 's0', $userdata->avatar ?? '');
            $user = User::create([
                'first_name' => $userdata->user['given_name'],
                'last_name' => $userdata->user['family_name'],
                'email' => $userdata->email,
                'password' => Hash::make($uuid . now()),
                'social_type' => 'google',
                'profile_picture' => $pictureUrl, // Use the modified picture URL
            ]);

            $clientRole = Role::where('name', 'Client')->first();
            $user->roles()->attach($clientRole);
    
            Auth::login($user);
            return redirect('home');
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
            return redirect('home');
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
            return redirect('home');
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