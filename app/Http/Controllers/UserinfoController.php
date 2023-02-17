<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\File;
use App\Models\User;
use App\Models\AddCar;
use App\Models\AdminInfo;
use Hash;
use Session;

use Illuminate\Http\Request;

class UserinfoController extends Controller
{
    public function user_accountroute()
    {
        $data = array();
        if(Session::has('loginId')){
        $data = User::where('id','=',Session::get('loginId'))->first();}
        return view('main.account',compact('data'));
    }

    public function booking_route($id)
    {
        $data = array();
        if(Session::has('loginId')){
        $data = User::where('id','=',Session::get('loginId'))->first();}
        $viewcar = AddCar::find($id);
        return view('main.bookingforms',compact('data'))->with('viewcar', $viewcar);
    }

    public function db_allusers()
    {
        $data = array();
        if(Session::has('loginId'))
        {
        $data = AdminInfo::where('id','=',Session::get('loginId'))->first();
        }
        $user = User::all();
        return view ('dashboard.viewuser',compact('data'))->with('user', $user);
    }
}
