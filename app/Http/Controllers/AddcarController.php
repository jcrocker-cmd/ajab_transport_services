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

    public function db_viewvehicle($id)
    {
        $addcar = AddCar::find($id);
        return view ('dashboard.viewcar')->with('addcar', $addcar);
    }

    public function db_editcar($id)
    {
        $editcar = AddCar::find($id);
        return view('dashboard.editcar')->with('editcar', $editcar);
    }

    public function db_updatecar(Request $request, $id)
    {
        $addcar = AddCar::find($id);
        $input = $request->all();
        $addcar->update($input);
        return view('dashboard.viewcar')->with('addcar', $addcar); 
    }

    public function delete_car($id)
    {
        $deletecar = AddCar::find($id);
        $deletecar -> delete();
        return redirect('/all-vehicles')->with('deletecar', $deletecar); 
    }

    public function save(Request $request)
    {
        $addcar = $request->all();
        AddCar::create($addcar);
        return redirect('/add')->with('alert', 'Contact Addedd!');  

    }
}
