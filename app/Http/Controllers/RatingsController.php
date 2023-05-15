<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Ratings;
use App\Models\Booking;
use App\Models\AddCar;
use App\Models\Admin_Notification;
use Auth;
use Session;

class RatingsController extends Controller
{

    public function db_ratings_route()
    {
        $notificationsUnread = Admin_Notification::whereNull('read_at')->get();
        $ratings = Ratings::with('user', 'booking','car')->get();
        return view('dashboard.ratings', compact('notificationsUnread','ratings'));
    }
    

    // public function submit_rating(Request $request)
    // {
    //     $user_id = Auth::id();
    //     $car_id = $request->input('car_id');
    //     $booking_id = $request->input('booking_id');
    //     $rating = new Ratings;
    //     $rating->rating = $request->input('rating');
    //     $rating->rating_msg = $request->input('rating_msg');
    //     $rating->user_id = $user_id;
    //     $rating->car_id = $car_id;
    //     $rating->booking_id = $booking_id;
    //     $rating->save();
    
    //     return back()->with('success', 'You`ve Successfully Rated the car');
    // }

        public function submit_rating(Request $request)
    {
        $user_id = Auth::id();
        $car_id = $request->input('car_id');
        $booking_id = $request->input('booking_id');
        
        // Check if user has already rated this booking
        $booking = Booking::find($booking_id);
        if ($booking->car_rating === true) {
            return back()->with('error', 'You have already rated this car for this booking.');
        }

        
        $rating = new Ratings;
        $rating->rating = $request->input('rating');
        $rating->rating_msg = $request->input('rating_msg');
        $rating->user_id = $user_id;
        $rating->car_id = $car_id;
        $rating->booking_id = $booking_id;
        $rating->save();
        
        // Update booking to indicate user has rated
        $booking->car_rating = true;
        $booking->save();

        return back()->with('success', 'You have successfully rated the car.');
    }



    public function user_ratings_modal($id)
    {
        $rating = Booking::find($id);
        return response()->json([
            'status' => 200,
            'rating' => $rating,
        ]);
    }

    public function db_ratings_ajaxview($id)
    {
        $rating = Ratings::with('car','booking')->find($id);
        return response()->json([
            'status' => 200,
            'rating' => $rating,
        ]);
    }

    public function user_ratings_ajaxview($id)
    {
        $rating = Ratings::with('car','booking')->find($id);
        return response()->json([
            'status' => 200,
            'rating' => $rating,
        ]);
    }


    public function user_ratings_ajaxedit($id)
    {
        $rating = Ratings::with('car','booking')->find($id);
        return response()->json([
            'status' => 200,
            'rating' => $rating,
        ]);
    }

    public function db_ratings_delete($id)
    {
        $rating = Ratings::find($id);
        $rating -> delete();
        Session::flash('status','You`ve successfully deleted a rating!');
        return redirect('/allratings')->with('rating', $rating); 
    }

    public function user_ratings_delete($id)
    {
        $rating = Ratings::find($id);
        $rating -> delete();
        Session::flash('status','You`ve successfully deleted a rating!');
        return redirect('/account')->with('rating', $rating); 
    }

    public function user_update_ratings(Request $request)
    {
        $id = $request->input('ratings_id');
        $edit_ratings = Ratings::find($id);
        $edit_ratings->rating = $request->input('rating');
        $edit_ratings->rating_msg = $request->input('rating_msg');
        $edit_ratings->save();
        Session::flash('status','Succesfully Edited Ratings.');
        return redirect('/account')->with('edit_ratings', $edit_ratings); 
    }
}
