<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Booking;
use App\Models\AddCar;


class Ratings extends Model
{
    use HasFactory;
    protected $table = 'ratings';
    protected $primaryKey = 'id';
    protected $fillable = [
        'rating',
        'rating_msg',
        'user_id',
        'car_id',
        'booking_id'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }

    
    public function car()
    {
        return $this->belongsTo(AddCar::class);
    }



}
