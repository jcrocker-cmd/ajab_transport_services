<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\AdminInfo;
use App\Models\Inquiry;
use Mail;
use DB;
use App\Models\Admin_Notification;


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
        $notificationsUnread = Admin_Notification::whereNull('read_at')->get();
        $inquiry = Inquiry::orderByDesc('created_at')->get();

        // DAY
        $daily_inquiries = DB::table('inquiries')
        ->select(DB::raw('COUNT(*) as count, DATE(created_at) as day'))
        ->groupBy('day')
        ->get();

        $days = [];
        $day_inquiry_counts = [];

        foreach ($daily_inquiries as $inquiries) {
            $days[] = date("F j, Y", strtotime($inquiries->day));
            $day_inquiry_counts [] = $inquiries->count;
        }


        // WEEK
        $weekly_inquiries = DB::table('inquiries')
            ->select(DB::raw('COUNT(*) as count, DATE(DATE_FORMAT(created_at, "%Y-%m-%d") - INTERVAL DAYOFWEEK(created_at) - 1 DAY) as week_start_date'))
            ->groupBy('week_start_date')
            ->get();

        $weeks = [];
        $week_inquiry_counts  = [];

        foreach ($weekly_inquiries as $inquiries) {
            $weeks[] = 'Week of '.date("F j, Y", strtotime($inquiries->week_start_date));
            $week_inquiry_counts [] = $inquiries->count;
        }

        // MONTH
        $monthly_inquiries = DB::table('inquiries')
            ->select(DB::raw('COUNT(*) as count, DATE(DATE_FORMAT(created_at, "%Y-%m-01")) as month_start_date'))
            ->groupBy('month_start_date')
            ->get();

        $months = [];
        $month_inquiry_counts  = [];

        foreach ($monthly_inquiries as $inquiries) {
            $months[] = date("F Y", strtotime($inquiries->month_start_date));
            $month_inquiry_counts [] = $inquiries->count;
        }

        // YEAR
        $yearly_inquiries = DB::table('inquiries')
        ->select(DB::raw('COUNT(*) as count, YEAR(created_at) as year'))
        ->groupBy('year')
        ->get();

        $years = [];
        $year_inquiry_counts = [];

        foreach ($yearly_inquiries as $inquiries) {
        $years[] = $inquiries->year;
        $year_inquiry_counts[] = $inquiries->count;
        }

        return view ('dashboard.inquiry', compact('notificationsUnread','day_inquiry_counts', 'week_inquiry_counts', 'month_inquiry_counts','year_inquiry_counts','days', 'weeks', 'months','years','inquiry'));
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