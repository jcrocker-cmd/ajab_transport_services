<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddCar extends Model
{
    use HasFactory;
    use HasFactory;
    protected $table = 'addcar';
    protected $primaryKey = 'id';
    protected $fillable = [
        'vehicle',
        'brand',
        'model',
        'year',
        'plate',
        'seats',
        'fuel',
        'displacement',
        'mileage',
        'carlocation',
        'transmission',

        'fname',
        'mname',
        'lname',
        'purok',
        'baranggay',
        'town',
        'city',
        'postal',
        
        'dailyrate',
        'weeklyrate',
        'monthlyrate',
    ];
}
