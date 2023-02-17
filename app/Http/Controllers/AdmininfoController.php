<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\AdminInfo;
use App\Models\User;
use Hash;
use Session;

class AdmininfoController extends Controller
{
    public function loginroute()
   {
      return view('dashboard.dashboard-login');
   }

   public function dashboardroute()

   {
    $data = array();
    if(Session::has('loginId')){
    $data = AdminInfo::where('id','=',Session::get('loginId'))->first();
    }
    
    $numberOfUsers = User::count(); // Count the number of rows in the User table
    $allusers = User::all(); // Show all users
    return view('dashboard.dashboard', compact('data', 'numberOfUsers','allusers')); // Pass the data to your Blade view
    }


   public function admin_account_settings_route()
   {
    $data = array();
    if(Session::has('loginId')){
    $data = AdminInfo::where('id','=',Session::get('loginId'))->first();}
    return view('dashboard.settings',compact('data'));
   }

   function adminchecklogin(Request $request)
   {
    $this->validate($request, [
     'email'   => 'required|email|regex:/(.*)@ajabservices\.com/i',
     'password'  => 'required|alphaNum|min:8'
    ]);

    $user = AdminInfo::where('email','=',$request->email)->first();
    if ($user) {
       if(Hash::check($request->password,$user->password)){
           $request->session()->put('loginId',$user->id);
           return redirect('/dashboard');
       }else{
        return back()->with('adminloginfail','This password doesn`t match!');
       }
    } else {
       return back()->with('adminloginfail','This email doesn`t exist!');
    }
    
  }

  public function adminpp_update(Request $request, $id)
    {
        $data = AdminInfo::find($id);
        $input = $request->all();
        if ($image = $request->file('adminpp')) {

            $destinationPath = 'images/adminpp/'.$data->adminpp;
            if (File::exists($destinationPath)) {
                File::delete($destinationPath);
            }
            $destinationPath = 'images/adminpp/';
            $carImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $carImage);
            $input['adminpp'] = "$carImage";
        }else{
            unset($input['adminpp']);
        }
        $data->update($input);
        Session::flash('accountstatus','You`ve successfully edited your profile photo!');
        return view('dashboard.settings',compact('data'));
        
        
    }

    public function admininfo_update(Request $request, $id)
    {
        $data = Admininfo::find($id);
        $input = $request->all();
        $data->update($input);
        Session::flash('accountstatus','You`ve successfully edited your account information!');
        return view('dashboard.settings')->with('data', $data);;
    }

    public function adminpassword_update(Request $request, $id)
    {
        $request->validate([
            'old_password'=>'required|min:8|max:20|alphaNum',
            'new_password'=>'required|min:8|max:20|alphaNum',
            'confirm_password'=>'required|same:new_password',
        ]);

        $data = Admininfo::find($id);

        if (Hash::check($request->old_password, $data->password)) {
            
            $data->update([
                'password'=>bcrypt($request->new_password)
            ]);

            Session::flash('successpassword','You`ve successfully edited your password!');
            return view('dashboard.settings',compact('data'));

        } else {
            return back()
            ->withErrors(['old_password' => 'Old password does not match our records.'])
            ->withInput()
            ->with(session()->flash('failpassword', 'Password change failed!'));
        }
    }



  public function adminlogout()
   {
      if (Session::has('loginId')){
         Session::pull('loginId');
         return redirect('/dashboard-login');
      }
   }
}