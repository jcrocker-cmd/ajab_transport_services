<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\AddCar;
use App\Models\User;
use App\Models\Ratings;

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
        'msg',
        'user_id',
        'car_id',
        'status',
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
