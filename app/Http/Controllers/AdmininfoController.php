<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\AdminInfo;
use App\Models\User;
use App\Models\Signin;
use App\Models\Booking;
use App\Models\AddCar;
use Hash;
use Session;
use DB;
use Auth;
use Spatie\Permission\Models\Role;
use Carbon\Carbon;

class AdmininfoController extends Controller
{
    public function loginroute()
   {
      return view('dashboard.dashboard-login');
   }

   public function user_management_route()
   {
      $view_user = User::all();
      return view('dashboard.user-management', compact('view_user'));
   }


   public function create_user_role(Request $request)
   {
       $user = new User();
       $user->admin_fname = $request->input('admin_fname');
       $user->admin_mname = $request->input('admin_mname');
       $user->admin_lname = $request->input('admin_lname');
       $user->email = $request->input('email');
       $user->password = Hash::make($request->input('password'));
       $user->save();
   
       $roleId = $request->input('role');
       $role = Role::findById($roleId);
       if (!$role) {
           return redirect('/user/management')->with('failregister', 'Invalid role ID');
       }
   
       $user->assignRole($role);
   
       Session::flash('successregister', 'You`ve registered successfully, Try to LOG IN.');
       return redirect('/user/management');
   }

    public function db_user_view(Request $request)
    {
        $view_user = User::all();
        return view('dashboard.dashboard', compact('view_user'));
    }


   public function dashboardroute()

   {
    $data = array();
    if(Session::has('loginId')){
    $data = AdminInfo::where('id','=',Session::get('loginId'))->first();
    }
    
    $numberOfUsers = Signin::count(); // Count the number of rows in the User table
    $numberOfBookings = Booking::count(); // Count the number of Bookings

    $last24Hours = Carbon::now()->subDay();
    $allusers = Signin::where('created_at', '>=', $last24Hours)->orderBy('created_at')->get();

    $available = AddCar::where('status', 'Available')->count();
    $rented = AddCar::where('status', 'Rented')->count();
    

    $monthly_signins = DB::table('signins')
                     ->select(DB::raw('COUNT(*) as count, MONTH(created_at) as month'))
                     ->groupBy('month')
                     ->get();

    $months = [];
    $signins = [];

    foreach ($monthly_signins as $signin) {
        $months[] = date("F", mktime(0, 0, 0, $signin->month, 1));
        $signins[] = $signin->count;
    }

    return view('dashboard.dashboard', compact('data', 'numberOfUsers', 'allusers', 'numberOfBookings', 'months', 'signins', 'available','rented'));

    }


   public function admin_account_settings_route()
   {
    $user = Auth::user();
    return view('dashboard.settings',compact('user'));
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

  public function adminpp_update(Request $request)
    {
        $user = Auth::user();
        $input = $request->all();
        if ($image = $request->file('adminpp')) {

            $destinationPath = 'images/adminpp/'.$user->adminpp;
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
        $user->update($input);
        Session::flash('accountstatus','You`ve successfully edited your profile photo!');
        return view('dashboard.settings',compact('user'));
        
        
    }

    public function admininfo_update(Request $request)
    {
        $user = Auth::user();
        $input = $request->all();
        $user->update($input);
        Session::flash('accountstatus','You`ve successfully edited your account information!');
        return view('dashboard.settings')->with('user', $user);;
    }

    public function adminpassword_update(Request $request)
    {
        $request->validate([
            'old_password'=>'required|min:8|max:20|alphaNum',
            'new_password'=>'required|min:8|max:20|alphaNum',
            'confirm_password'=>'required|same:new_password',
        ]);
        $user = Auth::user();

        if (Hash::check($request->old_password, $user->password)) {
            
            $user->update([
                'password'=>bcrypt($request->new_password)
            ]);

            Session::flash('successpassword','You`ve successfully edited your password!');
            return view('dashboard.settings',compact('user'));

        } else {
            return back()
            ->withErrors(['old_password' => 'Old password does not match our records.'])
            ->withInput()
            ->with(session()->flash('failpassword', 'Password change failed!'));
        }
    }



  public function adminlogout()
   {
    Auth::logout();
    return redirect('/dashboard-login');
   }
}