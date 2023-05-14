<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\File;
use App\Models\User;
use App\Models\Signin;
use App\Models\AddCar;
use App\Models\AdminInfo;
use App\Models\Booking;
use App\Models\Ratings;
use Auth;
use Hash;
use Session;
use DB;
use Spatie\Permission\Models\Role;
use App\Models\Admin_Notification;
use App\Models\Client_Notification;
use Illuminate\Http\Request;

class UserinfoController extends Controller
{
    // public function user_accountroute()
    // {
    //     if(Session::has('loginId')){
    //         $user_id = Session::get('loginId');
    //         $data = Signin::where('id', '=', $user_id)->first();
    //         $bookings = Booking::with('car')->where('user_id', $user_id)->get();
    //         $bookingCount = $bookings->count();
    //         return view('main.account',compact('data','bookings','bookingCount'));
    //     } 
    //     return view('main.account',compact('data','bookings','user'));
    // }
    public function user_accountroute()
    {
        $user_id = Auth::id();
    
        $notificationsUnread = Client_Notification::where('user_id', $user_id)
            ->whereNull('read_at')
            ->get();
        $user = auth()->user();
        $bookings = Booking::with('car')->where('user_id', $user->id)->get();
        $ratings = Ratings::with('user', 'booking','car')->where('user_id', $user->id)->get();
        $ratingCount = Ratings::where('user_id', $user->id)->count();
        $bookingCount = $bookings->count();
        return view('main.account', compact('notificationsUnread','user', 'bookings','ratings', 'bookingCount','ratingCount'));
    }

    public function user_mybookings_route()
    {
        $user = auth()->user();
        $user_id = Auth::id();
    
        $notificationsUnread = Client_Notification::where('user_id', $user_id)
            ->whereNull('read_at')
            ->get();
        $bookings = Booking::with('car')->where('user_id', $user->id)->get();
        $bookingCount = $bookings->count();
        return view('main.my-booking', compact('notificationsUnread','user', 'bookings','bookingCount'));
    }

    
    public function user_myratings_route()
    {
        $user = auth()->user();
        $user_id = Auth::id();
    
        $notificationsUnread = Client_Notification::where('user_id', $user_id)
            ->whereNull('read_at')
            ->get();
        $notificationsUnread = Admin_Notification::whereNull('read_at')->get();
        $ratings = Ratings::with('user', 'booking','car')->where('user_id', $user->id)->get();
        $ratingCount = Ratings::where('user_id', $user->id)->count();
        return view('main.my-ratings', compact('notificationsUnread','user', 'ratings','ratingCount'));
    }


    public function db_allusers()
    {
        $notificationsUnread = Admin_Notification::whereNull('read_at')->get();
        $user = User::with('roles')
        ->whereHas('roles', function ($query) {
            $query->whereIn('name', ['Client']);
        })
        ->get();
        

        // DAY
        $daily_users = DB::table('users')
            ->join('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
            ->join('roles', 'model_has_roles.role_id', '=', 'roles.id')
            ->select(DB::raw('COUNT(*) as count, DATE(users.created_at) as day'))
            ->where('roles.name', '=', 'Client')
            ->groupBy('day')
            ->get();

        $days = [];
        $day_user_counts = [];

        foreach ($daily_users as $users) {
            $days[] = date("F j, Y", strtotime($users->day));
            $day_user_counts [] = $users->count;
        }


        // WEEK
        $weekly_users = DB::table('users')
            ->join('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
            ->join('roles', 'model_has_roles.role_id', '=', 'roles.id')
            ->select(DB::raw('COUNT(*) as count, DATE(DATE_FORMAT(users.created_at, "%Y-%m-%d") - INTERVAL DAYOFWEEK(users.created_at) - 1 DAY) as week_start_date'))
            ->where('roles.name', '=', 'Client')
            ->groupBy('week_start_date')
            ->get();

        $weeks = [];
        $week_user_counts  = [];

        foreach ($weekly_users as $users) {
            $weeks[] = 'Week of '.date("F j, Y", strtotime($users->week_start_date));
            $week_user_counts [] = $users->count;
        }

        // MONTH
        $monthly_users = DB::table('users')
            ->join('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
            ->join('roles', 'model_has_roles.role_id', '=', 'roles.id')
            ->select(DB::raw('COUNT(*) as count, DATE(DATE_FORMAT(users.created_at, "%Y-%m-01")) as month_start_date'))
            ->where('roles.name', '=', 'Client')
            ->groupBy('month_start_date')
            ->get();

        $months = [];
        $month_user_counts  = [];

        foreach ($monthly_users as $users) {
            $months[] = date("F Y", strtotime($users->month_start_date));
            $month_user_counts [] = $users->count;
        }

        // YEAR
        $yearly_users = DB::table('users')
        ->join('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
        ->join('roles', 'model_has_roles.role_id', '=', 'roles.id')
        ->select(DB::raw('COUNT(*) as count, YEAR(users.created_at) as year'))
        ->where('roles.name', '=', 'Client')
        ->groupBy('year')
        ->get();

        $years = [];
        $year_user_counts = [];

        foreach ($yearly_users as $users) {
        $years[] = $users->year;
        $year_user_counts[] = $users->count;
        }
            
        return view ('dashboard.viewuser', compact('notificationsUnread','day_user_counts', 'week_user_counts', 'month_user_counts','year_user_counts','days', 'weeks', 'months','years','user'));
    }

    
    // public function delete_user()
    // {
    //     $user = Auth::user();
    //     $photoPath = 'images/profile_picture/' . $user->profile_picture;
    //     if (File::exists($photoPath)) {
    //         File::delete($photoPath);
    //     }
    //     $user->delete();

    //     // Log out the user
    //     Auth::logout();

    //     // Redirect to the login page with a success message
    //     Session::flash('successdelete', 'You have successfully deleted your account!');
    //     return redirect('/log-in');
    // }


    public function delete_user()
    {
        $user = Auth::user();
        $user->is_active = false; // set the active field to false
        $user->save(); // save the changes to the database

        // Log out the user
        Auth::logout();

        // Redirect to the login page with a success message
        Session::flash('successdelete', 'You have successfully deactivated your account!');
        return redirect('/log-in');
    }


    public function db_user_delete($id)
    {
        $user = User::find($id);
        $user->is_active = false;
        $user->save();

        // Log out the user if they are the currently authenticated user
        if (Auth::user() && Auth::user()->id == $id) {
            Auth::logout();
        }

        Session::flash('status', 'You have successfully deactivated a user!');
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


    public function user_adminpp_update(Request $request)
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
        return redirect('/account')->with('user', $user);
        
    }

    public function user_info_update(Request $request)
    {
        $user = Auth::user();
        $input = $request->all();
        $user->update($input);
        Session::flash('accountstatus','You`ve successfully edited your account information!');
        return redirect('/account')->with('user', $user);;
    }

    public function user_password_update(Request $request)
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
            return redirect('/account',compact('user'));

        } else {
            return back()
            ->withErrors(['old_password' => 'Old password does not match our records.'])
            ->withInput()
            ->with(session()->flash('failpassword', 'Password change failed!'));
        }
    }

    // public function user_account_ajaxedit()
    // {
    //     $user_id = Auth::id();
    //     $data = User::where('id', '=', $user_id)->first();
    //     return response()->json([
    //         'status' => 200,
    //         'data' => $data,
    //     ]);
    // }
    
    

    // public function user_account_info_update(Request $request)
    // {

    //     $id = $request->input('user_id');
    //     $data = Signin::find($id);
    //     if (!$data) {
    //         return response()->json(['error' => 'User not found'], 404);
    //     }
    //     $data->first_name = $request->input('first_name');
    //     $data->last_name = $request->input('last_name');
    //     $data->email = $request->input('email');
    //     $data->bday = $request->input('bday');
    //     $data->gender = $request->input('gender');
    //     $data->update();

    //     Session::flash('status', 'You have successfully edited your INFORMATION!');
    //     return redirect('/account')->with('data', $data);
    // }

    // public function user_account_info_update(Request $request)
    // {
    //     $user = Auth::user();
    //     $input = $request->all();
    //     $user->update($input);
    //     Session::flash('status','You`ve successfully edited your account information!');
    //     return redirect('/account')->with(compact('user'));
    // }


}
