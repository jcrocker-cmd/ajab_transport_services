<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        'payment',
        'start_date',
        'start_time',
        'return_date',
        'return_time',
        'msg',
    ];
}
