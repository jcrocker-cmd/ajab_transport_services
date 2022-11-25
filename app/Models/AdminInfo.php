<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminInfo extends Model
{
    use HasFactory;
    protected $table = 'admininfo';
    protected $primaryKey = 'id';
    protected $fillable = [
        'email',
        'password',
        'admin_fname',
        'admin_mname',
        'admin_lname',
        'admin_no',
        'admin_bday',
        'admin_purok',
        'admin_baranggay',
        'admin_town',
        'admin_province',
        'admin_postal',
        'admin_fb',
        'admin_about',
        'adminpp',
    ];
}
