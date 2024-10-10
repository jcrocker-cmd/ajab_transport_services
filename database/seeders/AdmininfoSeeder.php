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
                'first_name' => 'John Christian',
                'middle_name' => 'B.',
                'last_name' => 'Narbaja',
                'email' => 'ondoijan@gmail.com',
                'password' => Hash::make('12345678'),
                'con_num' => '09127725518',
                'bday' => '2022-11-01',
                'purok' => 'Purok 2',
                'baranggay' => 'Salvador',
                'town' => 'Sierra Bullones',
                'province' => 'Bohol',
                'postal' => '6320',
                'fb' => 'John',
                'about' => 'John',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
    
            // Find the role by name and assign it to the user
            $role = Role::where('name', 'Super-Admin')->first();
            $user->assignRole($role);
    }
}
