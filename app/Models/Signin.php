<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Signin extends Model
{
    use HasFactory;
    protected $table = 'signins';
    protected $fillable = [
        'fname',
        'lname',
        'email',
        'password',
        'bday',
        'country',
        'gender'

    ];
}
