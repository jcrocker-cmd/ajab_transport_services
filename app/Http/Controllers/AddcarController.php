<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AddCar;

class AddcarController extends Controller
{
    function save(Request $request)
    {
        $addcar = new AddCar();
        $addcar ->vehicle = $request->input('vehicle');
        $addcar ->brand = $request->input('brand');
        $addcar ->model = $request->input('model');
        $addcar ->year = $request->input('year');
        $addcar ->plate = $request->input('plate');
        $addcar ->seats = $request->input('seats');
        $addcar ->fuel = $request->input('fuel');
        $addcar ->displacement = $request->input('displacement');
        $addcar ->mileage = $request->input('mileage');
        $addcar ->carlocation = $request->input('carlocation');
        $addcar ->transmission = $request->input('transmission');
        $addcar ->save();
        return redirect()->back();
        

    }
}
