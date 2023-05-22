<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\User;
use App\Models\Signin;
use App\Models\AddCar;
use App\Models\AdminInfo;
use App\Events\CarBooked;
use App\Models\Admin_Notification;
use App\Models\Client_Notification;
use Illuminate\Support\Facades\Event;
use Mail;
use Session;
use DB;
use Auth;
use App\Notifications\BookingNotification;
use Illuminate\Support\Facades\Notification;

class BookingformsController extends Controller
{ 

    public function booking_route($slug)
    {
        $user_id = Auth::id();
    
        $notificationsUnread = Client_Notification::where('user_id', $user_id)
            ->whereNull('read_at')
            ->get();
        $car_details = AddCar::where('slug', $slug)->first();
        return view('main.bookingforms', compact('car_details','notificationsUnread'));
    }

    public function succes_booking_route()
    {
        $user_id = Auth::id();
    
        $notificationsUnread = Client_Notification::where('user_id', $user_id)
            ->whereNull('read_at')
            ->get();
        return view('main.success-booking', compact('notificationsUnread'));

    }

    public function weekly_booking_route($slug)
    {
        $user_id = Auth::id();
    
        $notificationsUnread = Client_Notification::where('user_id', $user_id)
            ->whereNull('read_at')
            ->get();
        $car_details = AddCar::where('slug', $slug)->first();
        return view('main.weekly-bookingforms', compact('car_details','notificationsUnread'));
    }

    
    public function monthly_booking_route($slug)
    {
        $user_id = Auth::id();
    
        $notificationsUnread = Client_Notification::where('user_id', $user_id)
            ->whereNull('read_at')
            ->get();
        $car_details = AddCar::where('slug', $slug)->first();
        return view('main.monthly-bookingforms', compact('car_details','notificationsUnread'));
    }


    public function booking_submit(Request $request, $slug)
    {


    $car_details = AddCar::where('slug', $slug)->first();

    // Get the file data
    $front_license = $request->file('front_license');
    $back_license = $request->file('back_license');

    // Get the original file names
    $front_license_name = $front_license->getClientOriginalName();
    $back_license_name = $back_license->getClientOriginalName();
            
        $data = [
            'name' => $request->name,
            'con_num' => $request->con_num,
            'address' => $request->address,
            'con_email' => $request->con_email,
    
            'front_license' => $front_license_name,
            'back_license' => $back_license_name,
    
            'mode_del' => $request->mode_del,
    
            'payment' => $request->payment,
    
            'start_date' => $request->start_date,
            'start_time' => $request->start_time,
            'return_date' => $request->return_date,
            'return_time' => $request->return_time,
            
            'total_amount_payable' => $request->total_amount_payable,

    
            'msg' => $request->msg,
    
            'car_details' => $car_details,
        ];
    
        $data['car_id'] = $car_details->id;
    

        // Get the authenticated user's ID
        $user_id = Auth::id();
        $data['user_id'] = $user_id;
    
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
        $booking->total_amount_payable = $data['total_amount_payable'];
        $booking->msg = $data['msg'];
        $booking->car_id = $data['car_id'];
        $booking->user_id = $data['user_id'];
        $booking->status = 'In progress';
        $booking->form_type = 'Daily Booking Form';
    
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

        // Create custom notification
        $notification = new Admin_Notification();
        $notification->user_id = $data['user_id'];
        $notification->car_id = $data['car_id'];
        $notification->booking_id = $booking->id;
        $notification->message = 'Car has been booked';
        $notification->save();

        // Update car status
        $car = AddCar::findOrFail($car_details->id);
        $car->status = 'In progress';
        $car->save();
    
        // Send email notification
        Mail::send('main.daily-email-template', ['data' => $data], function($message) use ($data,$front_license_name, $back_license_name) {
            $message->to('johnchristian.narbaja@bisu.edu.ph');
            $message->subject('Daily Booking Form');
            $message->attach('images/license/front/' . $front_license_name, ['as' => $front_license_name]);
            $message->attach('images/license/back/' . $back_license_name, ['as' => $back_license_name]);
        
        });


        return redirect('/success-booking')->with('success', 'You`ve Successfully Book your car.');


    }


    public function weekly_booking_submit(Request $request, $slug)
    {


    $car_details = AddCar::where('slug', $slug)->first();

    // Get the file data
    $front_license = $request->file('front_license');
    $back_license = $request->file('back_license');

    // Get the original file names
    $front_license_name = $front_license->getClientOriginalName();
    $back_license_name = $back_license->getClientOriginalName();
            
        $data = [
            'name' => $request->name,
            'con_num' => $request->con_num,
            'address' => $request->address,
            'con_email' => $request->con_email,
    
            'front_license' => $front_license_name,
            'back_license' => $back_license_name,
    
            'mode_del' => $request->mode_del,
    
            'payment' => $request->payment,
    
            'start_date' => $request->start_date,
            'start_time' => $request->start_time,
            'return_date' => $request->return_date,
            'return_time' => $request->return_time,
            
            'total_amount_payable' => $request->total_amount_payable,

    
            'msg' => $request->msg,
    
            'car_details' => $car_details,
        ];
    
        $data['car_id'] = $car_details->id;
    

        // Get the authenticated user's ID
        $user_id = Auth::id();
        $data['user_id'] = $user_id;
    
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
        $booking->total_amount_payable = $data['total_amount_payable'];
        $booking->msg = $data['msg'];
        $booking->car_id = $data['car_id'];
        $booking->user_id = $data['user_id'];
        $booking->status = 'In progress';
        $booking->form_type = 'Weekly Booking Form';

    
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

        // Create custom notification
        $notification = new Admin_Notification();
        $notification->user_id = $data['user_id'];
        $notification->car_id = $data['car_id'];
        $notification->booking_id = $booking->id;
        $notification->message = 'Car has been booked';
        $notification->save();
        
        // Update car status
        $car = AddCar::findOrFail($car_details->id);
        $car->status = 'In progress';
        $car->save();
    
        // Send email notification
        Mail::send('main.weekly-email-template', ['data' => $data], function($message) use ($data,$front_license_name, $back_license_name) {
            $message->to('johnchristian.narbaja@bisu.edu.ph');
            $message->subject('Weekly Booking Form');
            $message->attach('images/license/front/' . $front_license_name, ['as' => $front_license_name]);
            $message->attach('images/license/back/' . $back_license_name, ['as' => $back_license_name]);
        
        });

      return redirect('/success-booking')->with('success', 'You`ve Successfully Book your car.');


      
    }


    public function monthly_booking_submit(Request $request, $slug)
    {


    $car_details = AddCar::where('slug', $slug)->first();

    // Get the file data
    $front_license = $request->file('front_license');
    $back_license = $request->file('back_license');

    // Get the original file names
    $front_license_name = $front_license->getClientOriginalName();
    $back_license_name = $back_license->getClientOriginalName();
            
        $data = [
            'name' => $request->name,
            'con_num' => $request->con_num,
            'address' => $request->address,
            'con_email' => $request->con_email,
    
            'front_license' => $front_license_name,
            'back_license' => $back_license_name,
    
            'mode_del' => $request->mode_del,
    
            'payment' => $request->payment,
    
            'start_date' => $request->start_date,
            'start_time' => $request->start_time,
            'return_date' => $request->return_date,
            'return_time' => $request->return_time,
            
            'total_amount_payable' => $request->total_amount_payable,

    
            'msg' => $request->msg,
    
            'car_details' => $car_details,
        ];
    
        $data['car_id'] = $car_details->id;
    

        // Get the authenticated user's ID
        $user_id = Auth::id();
        $data['user_id'] = $user_id;
    
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
        $booking->total_amount_payable = $data['total_amount_payable'];
        $booking->msg = $data['msg'];
        $booking->car_id = $data['car_id'];
        $booking->user_id = $data['user_id'];
        $booking->status = 'In progress';
        $booking->form_type = 'Monthly Booking Form';

    
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

        // Create custom notification
        $notification = new Admin_Notification();
        $notification->user_id = $data['user_id'];
        $notification->car_id = $data['car_id'];
        $notification->booking_id = $booking->id;
        $notification->message = 'Car has been booked';
        $notification->save();
        
        // Update car status
        $car = AddCar::findOrFail($car_details->id);
        $car->status = 'In progress';
        $car->save();
    
        // Send email notification
        Mail::send('main.monthly-email-template', ['data' => $data], function($message) use ($data,$front_license_name, $back_license_name) {
            $message->to('johnchristian.narbaja@bisu.edu.ph');
            $message->subject('Monthly Booking Form');
            $message->attach('images/license/front/' . $front_license_name, ['as' => $front_license_name]);
            $message->attach('images/license/back/' . $back_license_name, ['as' => $back_license_name]);
        
        });


        return redirect('/success-booking')->with('success', 'You`ve Successfully Book your car.');


    }





    public function confirmBooking($id)
    {
        $booking = Booking::find($id);

        if ($booking) {
            $booking->status = 'Confirmed';
            $booking->save();

            $car = $booking->car;
            $car->status = 'Rented';
            $car->save();

            // Create notification
            $notification = new Client_Notification;
            $notification->user_id = $booking->user_id;
            $notification->car_id = $booking->car_id;
            $notification->booking_id = $booking->id;
            $notification->message = 'Booking has been Confirmed';
            $notification->save();

            return redirect()->back()->with('status', 'Booking confirmed successfully.');
        }

        return redirect()->back()->with('status', 'Booking not found.');
    }

        public function declineBooking($id)
    {
        $booking = Booking::find($id);
        $booking->status = 'Declined';
        $booking->save();

        $car = $booking->car;
        $car->status = 'Available';
        $car->save();

        // Create notification
        $notification = new Client_Notification;
        $notification->user_id = $booking->user_id;
        $notification->car_id = $booking->car_id;
        $notification->booking_id = $booking->id;
        $notification->message = 'Booking has been Declined';
        $notification->save();

        return redirect('/bookings')->with('success', 'Booking declined.');
    }

    public function cancelBooking($id)
    {
        $booking = Booking::find($id);
        $booking->status = 'Cancelled';
        $booking->save();

        $car = $booking->car;
        $car->status = 'Available';
        $car->save();

        // Create notification
        $notification = new Admin_Notification;
        $notification->user_id = $booking->user_id;
        $notification->car_id = $booking->car_id;
        $notification->booking_id = $booking->id;
        $notification->message = 'Booking has been cancelled';
        $notification->save();

        return redirect('/account')->with('status', 'Booking Cancelled.');
    }

    // NOTIFICATIONS






    public function db_bookings()
    {

    $notificationsUnread = Admin_Notification::whereNull('read_at')->get();

      $booking = Booking::with(['car', 'user'])
      ->get();

      // DAY
      $daily_bookings = DB::table('bookingform')
          ->select(DB::raw('COUNT(*) as count, DATE(created_at) as day'))
          ->groupBy('day')
          ->get();

      $days = [];
      $day_booking_counts = [];

      foreach ($daily_bookings as $bookings) {
          $days[] = date("F j, Y", strtotime($bookings->day));
          $day_booking_counts [] = $bookings->count;
      }


      // WEEK
      $weekly_bookings = DB::table('bookingform')
          ->select(DB::raw('COUNT(*) as count, DATE(DATE_FORMAT(created_at, "%Y-%m-%d") - INTERVAL DAYOFWEEK(created_at) - 1 DAY) as week_start_date'))
          ->groupBy('week_start_date')
          ->get();

      $weeks = [];
      $week_booking_counts  = [];

      foreach ($weekly_bookings as $bookings) {
          $weeks[] = 'Week of '.date("F j, Y", strtotime($bookings->week_start_date));
          $week_booking_counts [] = $bookings->count;
      }

      // MONTH
      $monthly_bookings = DB::table('bookingform')
          ->select(DB::raw('COUNT(*) as count, DATE(DATE_FORMAT(created_at, "%Y-%m-01")) as month_start_date'))
          ->groupBy('month_start_date')
          ->get();

      $months = [];
      $month_booking_counts  = [];

      foreach ($monthly_bookings as $bookings) {
          $months[] = date("F Y", strtotime($bookings->month_start_date));
          $month_booking_counts [] = $bookings->count;
      }

      // YEAR
      $yearly_bookings = DB::table('bookingform')
      ->select(DB::raw('COUNT(*) as count, YEAR(created_at) as year'))
      ->groupBy('year')
      ->get();

      $years = [];
      $year_booking_counts = [];

      foreach ($yearly_bookings as $bookings) {
      $years[] = $bookings->year;
      $year_booking_counts[] = $bookings->count;
      }

      return view ('dashboard.booking', compact('notificationsUnread','day_booking_counts', 'week_booking_counts', 'month_booking_counts','year_booking_counts','days', 'weeks', 'months','years','booking',));
      }


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

    public function user_booking_ajaxview($id)
    {
        $booking = Booking::with('car')->find($id);
        $front_license = asset('/images/license/front/' . $booking->front_license);
        $back_license = asset('images/license/back/' . $booking->back_license);
        return response()->json([
            'status' => 200,
            'booking' => $booking,
            'front_license' => $front_license,
            'back_license' => $back_license,
        ]);
    }
}
