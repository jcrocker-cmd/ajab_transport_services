<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Models\CarInfo;
// use App\Models\OwnerInfo;
// use App\Models\Pricing;
use App\Models\AddCar;

class AddCarController extends Controller
{
    public function main_allcars()
    {
        $addcar = AddCar::all();
        return view ('main.homepage')->with('addcar', $addcar);
    }

    public function db_allvehicles()
    {
        $addcar = AddCar::all();
        return view ('dashboard.all-vehicles')->with('addcar', $addcar);
    }

    public function delete_car($id)
    {
        $addcar = AddCar::find($id);
        $addcar -> delete();
        return redirect()->back();
    }

    public function save(Request $request)
    {
        $addcar = $request->all();
        AddCar::create($addcar);
        return redirect('/add')->with('alert', 'Contact Addedd!');  

    }
}
