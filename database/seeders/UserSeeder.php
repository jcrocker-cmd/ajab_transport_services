<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Hash;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('signins')->insert([
            'first_name' => 'John Christian',
            'last_name' => 'Narbaja',
            'email' => 'narbajajcs@gmail.com',
            'password' => Hash::make('aug151973'),
            'bday' => '2022-11-01',
            'gender' => 'Male',
            'social_type' => 'AJAB Services',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
