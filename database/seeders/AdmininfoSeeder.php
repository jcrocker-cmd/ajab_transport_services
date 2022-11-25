<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Hash;

class AdmininfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admininfo')->insert([

            'email' => 'admin@ajabservices.com',
            'password' => Hash::make('aug151973'),
            'admin_fname' => 'John Christian',
            'admin_mname' => 'Balili',
            'admin_lname' => 'Narbaja',
            'admin_no' => '09127725518',
            'admin_bday' => '2022-11-01',
            'admin_purok' => 'Purok 2',
            'admin_baranggay' => 'Salvador',
            'admin_town' => 'Sierra Bullones',
            'admin_province' => 'Bohol',
            'admin_postal' => '6320',
            'admin_fb' => 'John',
            'admin_about' => 'John',
            'adminpp' => 'default-user.webp',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        // DB::table('admininfo')->insert([

        //     'email' => 'admin2@ajabservices.com',
        //     'password' => Hash::make('aug151973'),
        //     'admin_fname' => 'Angelo',
        //     'admin_mname' => 'Rosales',
        //     'admin_lname' => 'Balili',
        //     'admin_no' => '09127725518',
        //     'admin_bday' => '2022-11-01',
        //     'admin_purok' => 'Purok 2',
        //     'admin_baranggay' => 'Salvador',
        //     'admin_town' => 'Sierra Bullones',
        //     'admin_province' => 'Bohol',
        //     'admin_postal' => '6320',
        //     'admin_fb' => 'John',
        //     'admin_about' => 'John',
        //     'adminpp' => 'http://127.0.0.1:8000/images/adminpp/default-user.webp',
        //     'created_at' => Carbon::now(),
        //     'updated_at' => Carbon::now(),
        // ]);
    }
}
