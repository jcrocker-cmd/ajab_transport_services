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
        $car_details = AddCar::find($id);
        return view('main.bookingforms', compact('data', 'viewcar', 'car_details'));
        // return view('main.bookingforms',compact('data'))->with('viewcar', $viewcar),'latestAddCar', $latestAddCar;
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

    public function delete_user($id)
    {
        // Log out the user
        if (Session::has('loginId')) {
            Session::pull('loginId');
        }
    
        // Delete the user's data and car photo
        $user = User::find($id);
        $photoPath = 'images/uploads/' . $user->carphoto;
        if (File::exists($photoPath)) {
            File::delete($photoPath);
        }
        $user->delete();
    
        // Redirect to the login page with a success message
        Session::flash('successdelete', 'You have successfully deleted your account!');
        return redirect('/log-in');
    }
    

    public function db_user_delete($id)
    {
        $user = User::find($id);
        $user -> delete();
        Session::flash('status','You`ve successfully deleted a user!');
        return redirect('/allusers')->with('user', $user); 
    }

    public function db_user_ajaxview($id)
    {
        $user = User::find($id);
        return response()->json([
            'status' => 200,
            'user' => $user,
        ]);
    }

}
