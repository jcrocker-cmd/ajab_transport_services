<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

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

        'fname',
        'mname',
        'lname',
        'email',
        'phone',
        'bday',
        'purok',
        'baranggay',
        'town',
        'province',
        'postal',
        
        'dailyrate',
        'weeklyrate',
        'monthlyrate',

        'carphoto',
        'status',
    ];

    use Sluggable;

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => ['brand', 'model','year','transmission'],
                'unique' => true,
                'separator' => '-',
                'onUpdate' => true,
            ]
        ];
    }
}
