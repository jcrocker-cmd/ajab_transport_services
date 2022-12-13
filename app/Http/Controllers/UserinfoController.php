<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\File;
use App\Models\Signin;
use App\Models\AddCar;
use Hash;
use Session;

use Illuminate\Http\Request;

class UserinfoController extends Controller
{
    public function user_accountroute()
    {
        $data = array();
        if(Session::has('loginId')){
        $data = Signin::where('id','=',Session::get('loginId'))->first();}
        return view('main.account',compact('data'));
    }

    public function booking_route($id)
    {
        $data = array();
        if(Session::has('loginId')){
        $data = Signin::where('id','=',Session::get('loginId'))->first();}
        $viewcar = AddCar::find($id);
        return view('main.bookingforms',compact('data'))->with('viewcar', $viewcar);
    }
}
