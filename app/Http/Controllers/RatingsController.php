<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Ratings;
use App\Models\Booking;
use App\Models\AddCar;
use Auth;

class RatingsController extends Controller
{

    public function submit_rating(Request $request)
    {
        $user_id = Auth::id();
        $car_id = $request->input('car_id');
        $booking_id = $request->input('booking_id');
        $rating = new Ratings;
        $rating->rating = $request->input('rating');
        $rating->rating_msg = $request->input('rating_msg');
        $rating->user_id = $user_id;
        $rating->car_id = $car_id;
        $rating->booking_id = $booking_id;
        $rating->save();
    
        return back()->with('success', 'You`ve Successfully Rated the car');
    }


    public function user_ratings_modal($id)
    {
        $rating = Booking::find($id);
        return response()->json([
            'status' => 200,
            'rating' => $rating,
        ]);
    }
}
