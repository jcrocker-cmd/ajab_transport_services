<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookingformsController extends Controller
{ 
    public function booking_submit(Request $request)
    {
     $this->validate($request, [
      'name'   => 'required',
      'con-num'  => 'required',
      'address'  => 'required',
      'con-email'  => 'required'
     ]);
    }
}
