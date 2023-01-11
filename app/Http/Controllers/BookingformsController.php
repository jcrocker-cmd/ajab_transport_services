<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AddCar;
use Mail;

class BookingformsController extends Controller
{ 
    public function booking_submit(Request $request)
    {
     $this->validate($request, [
      'name'   => 'required',
      'con_num'  => 'required',
      'address'  => 'required',
      'con_email'  => 'required'
     ]);

     $data = [
        'name' => $request->name,
        'con_num' => $request->con_num,
        'address' => $request->address,
        'con_email' => $request->con_email,

        'mode_del' => $request->mode_del,

        'start_date' => $request->start_date,
        'start_time' => $request->start_time,
        'return_date' => $request->return_date,
        'return_time' => $request->return_time,

        'msg' => $request->msg,
      ];

    // $carinfo = AddCar::find($id);

      Mail::send('main.email-template', $data, function($message) use ($data) {
        $message->to('johnchristian.narbaja@bisu.edu.ph');
        $message->subject('Daily Booking Form');
      });

      return back();

    }
}
