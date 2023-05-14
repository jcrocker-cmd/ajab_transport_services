<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\AddCar;
use App\Models\User;
use App\Models\Booking;

class Admin_Notification extends Model
{
    use HasFactory;

    protected $table = 'admin_notifications';
    protected $primaryKey = 'id';
    protected $fillable = [
        'user_id',
        'car_id',
        'booking_id',
        'message'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function car()
    {
        return $this->belongsTo(AddCar::class);
    }

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }

}


