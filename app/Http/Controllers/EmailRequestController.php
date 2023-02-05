<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Mail;
// use App\Mail\EmailRequest;

class EmailRequestController extends Controller
{

    public function sendEmail(Request $request)
    {
        $data = [
          'name' => $request->name,
          'phone' => $request->phone,
          'email' => $request->email,
          'subject' => $request->subject,
          'content' => $request->content
        ];

        Mail::send('home.email-template', $data, function($message) use ($data) {
          $message->to('johnchristian.narbaja@bisu.edu.ph');
          $message->subject($data['subject']);
        });

        // Mail::to('narbajajc@gmail.com')->send(new EmailRequest($data));

        Session::flash('message','Request Successfully Sent!');
        return back();
    }
}