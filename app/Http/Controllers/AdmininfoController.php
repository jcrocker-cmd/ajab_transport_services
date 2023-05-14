<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin_Notification;
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
    $notificationsUnread = Admin_Notification::whereNull('read_at')->get();
    $view_user = User::with('roles')
    ->whereHas('roles', function ($query) {
        $query->whereIn('name', ['Super-Admin', 'Admin', 'Front-Desk']);
    })
    ->get();

      return view('dashboard.user-management', compact('notificationsUnread','view_user'));
   }


   public function create_user_role(Request $request)
   {
       $user = new User();
       $user->first_name = $request->input('first_name');
       $user->middle_name = $request->input('middle_name');
       $user->last_name = $request->input('last_name');
       $user->email = $request->input('email');
       $user->password = Hash::make($request->input('password'));
       $user->save();
   
       $roleId = $request->input('role');
       $role = Role::findById($roleId);
       if (!$role) {
           return redirect('/user/management')->with('failregister', 'Invalid role ID');
       }
   
       $user->assignRole($role);
   
       Session::flash('status', 'You`ve registered successfully, Try to LOG IN.');
       return redirect('/user/management');
   }



    public function db_user_view(Request $request)
    {
        $view_user = User::all();
        return view('dashboard.dashboard', compact('view_user'));
    }

    public function db_route_sales()
    {

        $notificationsUnread = Admin_Notification::whereNull('read_at')->get();

        // DAY
        $daily_payment = DB::table('bookingform')
        ->select(DB::raw('SUM(total_amount_payable) as total_sales, DATE(created_at) as day'))
        ->where('status', '=', 'Closed')
        ->groupBy('day')
        ->get();


        $days = [];
        $day_counts = [];
        
        foreach ($daily_payment as $payment) {
            $days[] = date("F j, Y", strtotime($payment->day));
            $day_counts [] = $payment->total_sales;
        }
        


        // WEEK
        $weekly_payment = DB::table('bookingform')
        ->select(DB::raw('SUM(total_amount_payable) as total_price, DATE(DATE_FORMAT(created_at, "%Y-%m-%d") - INTERVAL DAYOFWEEK(created_at) - 1 DAY) as week_start_date'))
        ->where('status', 'Closed')
        ->groupBy('week_start_date')
        ->get();
    
        $weeks = [];
        $week_counts  = [];
        
        foreach ($weekly_payment as $payment) {
            $weeks[] = 'Week of '.date("F j, Y", strtotime($payment->week_start_date));
            $week_counts [] = $payment->total_price;
        }
    

        // MONTH
        $monthly_payment = DB::table('bookingform')
            ->select(DB::raw('SUM(total_amount_payable) as sum, DATE(DATE_FORMAT(created_at, "%Y-%m-01")) as month_start_date'))
            ->where('status', 'Closed')
            ->groupBy('month_start_date')
            ->get();

        $months = [];
        $month_counts  = [];

        foreach ($monthly_payment as $payment) {
            $months[] = date("F Y", strtotime($payment->month_start_date));
            $month_counts [] = $payment->sum;
        }



        // YEAR
        $yearly_payment = DB::table('bookingform')
        ->select(DB::raw('SUM(total_amount_payable) as total_sales, YEAR(created_at) as year'))
        ->where('status', 'Closed')
        ->groupBy('year')
        ->get();
    
        $years = [];
        $year_counts = [];
        
        foreach ($yearly_payment as $payment) {
            $years[] = $payment->year;
            $year_counts[] = $payment->total_sales;
        }
        

      return view('dashboard.sales', 
      compact('notificationsUnread','day_counts', 'week_counts', 'month_counts','year_counts','days', 'weeks', 'months','years',));
    }


   public function dashboardroute()

   {
    $notificationsUnread = Admin_Notification::whereNull('read_at')->get();
    
    $numberOfUsers = User::whereHas('roles', function ($query) {
        $query->where('name', 'Client');
    })->count();
    
    $numberOfBookings = Booking::count(); // Count the number of Bookings

    $last24Hours = Carbon::now()->subDay();

    $allusers = User::with('roles')
    ->whereHas('roles', function ($query) {
        $query->whereIn('name', ['Client']);
    })
    ->where('created_at', '>=', $last24Hours)
    ->orderBy('created_at')
    ->get();

    $available = AddCar::where('status', 'Available')->count();
    $rented = AddCar::where('status', 'Rented')->count();
    

    $monthly_signins = DB::table('users')
    ->join('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
    ->join('roles', 'model_has_roles.role_id', '=', 'roles.id')
    ->select(DB::raw('COUNT(*) as count, MONTH(users.created_at) as month'))
    ->where('roles.name', '=', 'Client')
    ->groupBy('month')
    ->get();

    $months = [];
    $signins = [];

    foreach ($monthly_signins as $signin) {
    $months[] = date("F", mktime(0, 0, 0, $signin->month, 1));
    $signins[] = $signin->count;
}

    return view('dashboard.dashboard', compact('notificationsUnread','numberOfUsers', 'allusers', 'numberOfBookings', 'months', 'signins', 'available','rented'));

    }


   public function admin_account_settings_route()
   {
    $notificationsUnread = Admin_Notification::whereNull('read_at')->get();
    $user = Auth::user();
    return view('dashboard.settings',compact('notificationsUnread','user'));
   }

//    function adminchecklogin(Request $request)
//    {
//     $this->validate($request, [
//      'email'   => 'required|email|regex:/(.*)@ajabservices\.com/i',
//      'password'  => 'required|alphaNum|min:8'
//     ]);

//     $user = AdminInfo::where('email','=',$request->email)->first();
//     if ($user) {
//        if(Hash::check($request->password,$user->password)){
//            $request->session()->put('loginId',$user->id);
//            return redirect('/dashboard');
//        }else{
//         return back()->with('adminloginfail','This password doesn`t match!');
//        }
//     } else {
//        return back()->with('adminloginfail','This email doesn`t exist!');
//     }
    
//   }

  public function adminpp_update(Request $request)
    {
        $user = Auth::user();
        $input = $request->all();
        if ($image = $request->file('profile_picture')) {

            $destinationPath = 'images/profile_picture/'.$user->profile_picture;
            if (File::exists($destinationPath)) {
                File::delete($destinationPath);
            }
            $destinationPath = 'images/profile_picture/';
            $carImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $carImage);
            $input['profile_picture'] = "$carImage";
        }else{
            unset($input['profile_picture']);
        }
        $user->update($input);
        Session::flash('accountstatus','You`ve successfully edited your profile photo!');
        return redirect('/settings')->with('user', $user);
        
    }

    public function admininfo_update(Request $request)
    {
        $user = Auth::user();
        $input = $request->all();
        $user->update($input);
        Session::flash('accountstatus','You`ve successfully edited your account information!');
        return redirect('/settings')->with('user', $user);;
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
            return redirect('/settings',compact('user'));

        } else {
            return back()
            ->withErrors(['old_password' => 'Old password does not match our records.'])
            ->withInput()
            ->with(session()->flash('failpassword', 'Password change failed!'));
        }
    }

    public function db_dashboard_users_ajaxview($id)
    {
        $user = User::with('roles')->find($id);
        return response()->json([
            'status' => 200,
            'user' => $user,
        ]);
    }

    public function db_dashboard_users_ajaxedit($id)
    {
        $user = User::find($id);
        return response()->json([
            'status' => 200,
            'user' => $user,
        ]);
    }

    public function update_db_user(Request $request)
    {
        $user_id = $request->input('user_id');
        $user = User::find($user_id);
        $user->first_name = $request->input('first_name');
        $user->middle_name = $request->input('middle_name');
        $user->last_name = $request->input('last_name');
        $user->email = $request->input('email');
        
        $roleId = $request->input('role');
        $role = Role::findById($roleId);
        if (!$role) {
            return redirect('/user/management')->with('failregister', 'Invalid role ID');
        }
    
        $user->syncRoles([$role]);
    
        $user->update();
    
        Session::flash('status', 'User role updated successfully.');
        return redirect('/user/management');
    }

    public function delete_db_user($id)
    {
        $delete_user = User::find($id);
        $delete_user -> delete();
        Session::flash('status','You`ve successfully deleted a User!');
        return redirect('/user/management')->with('delete_user', $delete_user); 
    }
    



  public function adminlogout()
   {
    Auth::logout();
    return redirect('/dashboard-login');
   }
}