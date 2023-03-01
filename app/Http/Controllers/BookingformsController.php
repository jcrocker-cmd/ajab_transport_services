<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\User;
use App\Models\AddCar;
use App\Models\AdminInfo;
use Mail;
use Session;

class BookingformsController extends Controller
{ 
    public function booking_submit(Request $request, $id)
    {
    $car_details = AddCar::find($id);

     $data = [
        'name' => $request->name,
        'con_num' => $request->con_num,
        'address' => $request->address,
        'con_email' => $request->con_email,

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
      $booking->mode_del = $data['mode_del'];
      $booking->payment = $data['payment'];
      $booking->start_date = $data['start_date'];
      $booking->start_time = $data['start_time'];
      $booking->return_date = $data['return_date'];
      $booking->return_time = $data['return_time'];
      $booking->msg = $data['msg'];
      $booking->car_id = $data['car_id'];
      $booking->save();

      // Mail::send('main.email-template', $data, function($message) use ($data) {
      //   $message->to('johnchristian.narbaja@bisu.edu.ph');
      //   $message->subject('Daily Booking Form');
      // });

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
        return view ('dashboard.booking',compact('data'))->with('booking', $booking);
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
        return response()->json([
            'status' => 200,
            'booking' => $booking,
        ]);
    }
}
