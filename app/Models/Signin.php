<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Signin extends Model
{
    use HasFactory;
    protected $table = 'signins';
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'bday',
        'gender'
    ];

    // In Signin model
    // public function bookings()
    // {
    //     return $this->hasMany(Booking::class);
    // }
}
