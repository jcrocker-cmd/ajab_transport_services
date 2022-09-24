<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddCar extends Model
{
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


    ];
}
