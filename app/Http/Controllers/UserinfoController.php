<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\File;
use App\Models\User;
use App\Models\AddCar;
use App\Models\AdminInfo;
use App\Models\Booking;
use Hash;
use Session;
use DB;

use Illuminate\Http\Request;

class UserinfoController extends Controller
{
    public function user_accountroute()
    {
        if(Session::has('loginId')){
            $user_id = Session::get('loginId');
            $data = User::where('id', '=', $user_id)->first();
            $bookings = Booking::with('car')->where('user_id', $user_id)->get();
            $bookingCount = $bookings->count();
            return view('main.account',compact('data','bookings','bookingCount'));
        } 
        return view('main.account',compact('data','bookings','user'));
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

        // DAY
        $daily_users = DB::table('users')
            ->select(DB::raw('COUNT(*) as count, DATE(created_at) as day'))
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
            ->select(DB::raw('COUNT(*) as count, DATE(DATE_FORMAT(created_at, "%Y-%m-%d") - INTERVAL DAYOFWEEK(created_at) - 1 DAY) as week_start_date'))
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
            ->select(DB::raw('COUNT(*) as count, DATE(DATE_FORMAT(created_at, "%Y-%m-01")) as month_start_date'))
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
        ->select(DB::raw('COUNT(*) as count, YEAR(created_at) as year'))
        ->groupBy('year')
        ->get();

        $years = [];
        $year_user_counts = [];

        foreach ($yearly_users as $users) {
        $years[] = $users->year;
        $year_user_counts[] = $users->count;
        }
            
        return view ('dashboard.viewuser', compact('data', 'day_user_counts', 'week_user_counts', 'month_user_counts','year_user_counts','days', 'weeks', 'months','years','user'));
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
