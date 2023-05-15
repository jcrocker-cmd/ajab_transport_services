<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\AddCar;
use App\Models\User;
use App\Models\Ratings;
use App\Notifications\BookingNotification;
use Illuminate\Support\Facades\Notification;


class Booking extends Model
{
    use HasFactory;
    protected $table = 'bookingform';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'con_num',
        'address',
        'con_email',
        'mode_del',
        'front_license',
        'back_license',
        'payment',
        'start_date',
        'start_time',
        'return_date',
        'return_time',
        'form_type',
        'msg',
        'user_id',
        'car_id',
        'status',
        'car_rating',
        'total_amount_payable',
    ];

    public function car()
    {
        return $this->belongsTo(AddCar::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function ratings()
    {
        return $this->hasMany(Ratings::class);
    }


}
