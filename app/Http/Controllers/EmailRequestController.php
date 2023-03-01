<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\AdminInfo;
use App\Models\Inquiry;
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

        // Save data to database
        $inquiry = new Inquiry;
        $inquiry->name = $data['name'];
        $inquiry->phone = $data['phone'];
        $inquiry->email = $data['email'];
        $inquiry->subject = $data['subject'];
        $inquiry->content = $data['content'];
        $inquiry->save();

        Mail::send('home.email-template', $data, function($message) use ($data) {
          $message->to('johnchristian.narbaja@bisu.edu.ph');
          $message->subject($data['subject']);
        });

        // Mail::to('narbajajc@gmail.com')->send(new EmailRequest($data));

        Session::flash('message','Request Successfully Sent!');
        return back();
    }

    public function db_inquiry()
    {
        $data = array();
        if(Session::has('loginId'))
        {
        $data = AdminInfo::where('id','=',Session::get('loginId'))->first();
        }
        $inquiry = Inquiry::all();
        return view ('dashboard.inquiry',compact('data'))->with('inquiry', $inquiry);
    }

    public function db_inquiry_delete($id)
    {
        $inquiry = Inquiry::find($id);
        $inquiry -> delete();
        Session::flash('status','You`ve successfully deleted a inquiry!');
        return redirect('/inquiry')->with('inquiry', $inquiry); 
    }

    public function db_inquiry_ajaxview($id)
    {
        $inquiry = Inquiry::find($id);
        return response()->json([
            'status' => 200,
            'inquiry' => $inquiry,
        ]);
    }
}