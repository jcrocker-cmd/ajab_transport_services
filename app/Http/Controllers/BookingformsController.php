<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\User;
use App\Models\AddCar;
use App\Models\AdminInfo;
use Mail;
use Session;
use DB;

class BookingformsController extends Controller
{ 
    public function booking_submit(Request $request, $id)
    {
    $car_details = AddCar::find($id);

    // Get the file data
    $front_license = $request->file('front_license');
    $back_license = $request->file('back_license');

     $data = [
        'name' => $request->name,
        'con_num' => $request->con_num,
        'address' => $request->address,
        'con_email' => $request->con_email,

        'front_license' => $request->front_license,
        'back_license' => $request->back_license,

        'mode_del' => $request->mode_del,

        'payment' => $request->payment,

        'start_date' => $request->start_date,
        'start_time' => $request->start_time,
        'return_date' => $request->return_date,
        'return_time' => $request->return_time,

        'msg' => $request->msg,

        'car_details' => $car_details,
      ];

      $data['car_id'] = $car_details->id;

      
    // Save data to database
      $booking = new Booking;
      $booking->name = $data['name'];
      $booking->con_num = $data['con_num'];
      $booking->address = $data['address'];
      $booking->con_email = $data['con_email'];

      $booking->front_license = $data['front_license'];
      $booking->back_license  = $data['back_license'];

      $booking->mode_del = $data['mode_del'];
      $booking->payment = $data['payment'];
      $booking->start_date = $data['start_date'];
      $booking->start_time = $data['start_time'];
      $booking->return_date = $data['return_date'];
      $booking->return_time = $data['return_time'];
      $booking->msg = $data['msg'];
      $booking->car_id = $data['car_id'];


      if ($front_license) {
        $front_license_name = time() . '_' . $front_license->getClientOriginalName();
        $front_license->move('images/license/front/', $front_license_name);
        $booking->front_license = $front_license_name;
    }
    
      if ($back_license) {
          $back_license_name = time() . '_' . $back_license->getClientOriginalName();
          $back_license->move('images/license/back/', $back_license_name);
          $booking->back_license = $back_license_name;
    }
    

      $booking->save();

      Mail::send('main.email-template', ['data' => $data], function($message) use ($data) {
        $message->to('johnchristian.narbaja@bisu.edu.ph');
        $message->subject('Daily Booking Form');
    });


      return back()->with('success', 'You`ve Successfully Book your car');  

    }

    public function db_bookings()
    {
        $data = array();
        if(Session::has('loginId'))
        {
        $data = AdminInfo::where('id','=',Session::get('loginId'))->first();
        }
        $booking = Booking::with('car')->get();

        // DAY
        $daily_bookings = DB::table('bookingform')
        ->select(DB::raw('COUNT(*) as count, DATE(created_at) as day'))
        ->groupBy('day')
        ->get();

        $days = [];
        $day_booking_counts  = [];

        foreach ($daily_bookings as $bookings) {
            $days[] = date("Y-m-d", strtotime($bookings->day));
            $day_booking_counts [] = $bookings->count;
        }

        // WEEK
        $weekly_bookings = DB::table('bookingform')
        ->select(DB::raw('COUNT(*) as count, YEAR(created_at) as year, WEEK(created_at) as week'))
        ->groupBy('year', 'week')
        ->get();

        $weeks = [];
        $week_booking_counts  = [];

        foreach ($weekly_bookings as $bookings) {
            $weeks[] = 'Week '.$bookings->week.', '.$bookings->year;
            $week_booking_counts [] = $bookings->count;
        }

        // MONTH
        $monthly_bookings = DB::table('bookingform')
        ->select(DB::raw('COUNT(*) as count, MONTH(created_at) as month'))
        ->groupBy('month')
        ->get();

        $months = [];
        $month_booking_counts  = [];
    
        foreach ($monthly_bookings as $bookings) {
            $months[] = date("F", mktime(0, 0, 0, $bookings->month, 1));
            $month_booking_counts [] = $bookings->count;
        }

        return view ('dashboard.booking', compact('data', 'day_booking_counts', 'week_booking_counts', 'month_booking_counts','days', 'weeks', 'months','booking'));
      }

    // public function car()
    // {
    //     return $this->belongsTo(AddCar::class);
    // }


    public function db_booking_delete($id)
    {
        $booking = Booking::find($id);
        $booking -> delete();
        Session::flash('status','You`ve successfully deleted a booking!');
        return redirect('/bookings')->with('booking', $booking); 
    }

    public function db_booking_ajaxview($id)
    {
        $booking = Booking::with('car')->find($id);
        $front_license = asset('images/license/front/' . $booking->front_license);
        $back_license = asset('images/license/back/' . $booking->back_license);
        return response()->json([
            'status' => 200,
            'booking' => $booking,
            'front_license' => $front_license,
            'back_license' => $back_license,
        ]);
    }
}
