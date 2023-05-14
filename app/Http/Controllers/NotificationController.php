<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Models\Admin_Notification;
use App\Models\Client_Notification;
use Auth;



class NotificationController extends Controller
{
    public function db_notification()
    {

        $notificationsUnread = Admin_Notification::whereNull('read_at')->get();
        $notification = Admin_Notification::with(['car', 'user','booking'])
        ->get();
        return view ('dashboard.notification',compact('notification','notificationsUnread'));
    }

    public function user_notification()
    {
        $user_id = Auth::id();
    
        $notificationsUnread = Client_Notification::where('user_id', $user_id)
            ->whereNull('read_at')
            ->get();
    
        $notification = Client_Notification::with(['car', 'user', 'booking'])
            ->where('user_id', $user_id)
            ->get();
    
        return view('main.my-notification', compact('notification', 'notificationsUnread'));
    }
    


    public function markNotificationAsRead_admin($id)
    {
        $notification = Admin_Notification::findOrFail($id);
        $notification->read_at = now();
        $notification->save();

        return redirect('/notification')->with('status', 'Notification marked as read.');
    }

    public function markNotificationAsRead_user($id)
    {
        $notification = Client_Notification::findOrFail($id);
        $notification->read_at = now();
        $notification->save();

        return redirect('/my_notification')->with('status', 'Notification marked as read.');
    }

    public function deleteNotification_admin($id)
    {
        $notification = Admin_Notification::findOrFail($id);
        $notification->status = 'Notification has been deleted';
        $notification->delete();

        return redirect('/notification')->with('status', 'Notification has been deleted.');
    }

    public function deleteNotification_user($id)
    {
        $notification = Client_Notification::findOrFail($id);
        $notification->status = 'Notification has been deleted';
        $notification->delete();

        return redirect('/my_notification')->with('status', 'Notification has been deleted.');
    }


}
