<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Hash;

use App\Models\User;
use Spatie\Permission\Models\Role;


class AdmininfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

            $user = User::create([
                'admin_fname' => 'Johnny Boy',
                'admin_lname' => 'Narbaja',
                'admin_mname' => 'Narbaja',
                'email' => 'sample@gmail.com',
                'password' => Hash::make('aug151973'),
                'admin_no' => '09127725518',
                'admin_bday' => '2022-11-01',
                'admin_purok' => 'Purok 2',
                'admin_baranggay' => 'Salvador',
                'admin_town' => 'Sierra Bullones',
                'admin_province' => 'Bohol',
                'admin_postal' => '6320',
                'admin_fb' => 'John',
                'admin_about' => 'John',
                'adminpp' => 'default-user.png',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
    
            // Find the role by name and assign it to the user
            $role = Role::where('name', 'Super-Admin')->first();
            $user->assignRole($role);

        // DB::table('users')->insert([

        //     'admin_fname' => 'John Christian',
        //     'admin_lname' => 'Narbaja',
        //     'admin_mname' => 'Narbaja',
        //     'email' => 'narbajajc@gmail.com',
        //     'password' => Hash::make('aug151973'),
        //     'admin_no' => '09127725518',
        //     'admin_bday' => '2022-11-01',
        //     'admin_purok' => 'Purok 2',
        //     'admin_baranggay' => 'Salvador',
        //     'admin_town' => 'Sierra Bullones',
        //     'admin_province' => 'Bohol',
        //     'admin_postal' => '6320',
        //     'admin_fb' => 'John',
        //     'admin_about' => 'John',
        //     'adminpp' => 'default-user.png',
        //     'created_at' => Carbon::now(),
        //     'updated_at' => Carbon::now(),
        // ]);

        // DB::table('users')->insert([

        //     'admin_fname' => 'Johnny Boy',
        //     'admin_lname' => 'Narbaja',
        //     'admin_mname' => 'Narbaja',
        //     'email' => '123@gmail.com',
        //     'password' => Hash::make('aug151973'),
        //     'admin_no' => '09127725518',
        //     'admin_bday' => '2022-11-01',
        //     'admin_purok' => 'Purok 2',
        //     'admin_baranggay' => 'Salvador',
        //     'admin_town' => 'Sierra Bullones',
        //     'admin_province' => 'Bohol',
        //     'admin_postal' => '6320',
        //     'admin_fb' => 'John',
        //     'admin_about' => 'John',
        //     'adminpp' => 'default-user.png',
        //     'created_at' => Carbon::now(),
        //     'updated_at' => Carbon::now(),
        // ]);

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
