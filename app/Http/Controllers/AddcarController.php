<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Models\CarInfo;
// use App\Models\OwnerInfo;
// use App\Models\Pricing;
use App\Models\AddCar;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use App\Models\Signin;

class AddCarController extends Controller
{
    public function main_allcars()
    {
        $addcar = AddCar::all();

        $data = array();
        if(Session::has('loginId'))
        {
        $data = Signin::where('id','=',Session::get('loginId'))->first();

        }
        return view ('main.homepage',compact('data'))->with('addcar', $addcar);
    }

    public function main_viewvehicle($id)
    {
        $data = array();
        if(Session::has('loginId'))
        {
        $data = Signin::where('id','=',Session::get('loginId'))->first();

        }

        $viewcar = AddCar::find($id);
        return view ('main.viewcar',compact('data'))->with('viewcar', $viewcar);
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
        if ($image = $request->file('carphoto')) {

            $destinationPath = 'images/uploads/'.$addcar->carphoto;
            if (File::exists($destinationPath)) {
                File::delete($destinationPath);
            }
            $destinationPath = 'images/uploads/';
            $carImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $carImage);
            $input['carphoto'] = "$carImage";
        }else{
            unset($input['carphoto']);
        }
        $addcar->update($input);
        Session::flash('message','You`ve successfully edited your exisiting car!');
        return view('dashboard.viewcar')->with('addcar', $addcar); 
        
        
    }

    public function delete_car($id)
    {
        $deletecar = AddCar::find($id);
        $destinationPath = 'images/uploads/'.$deletecar->carphoto;
        if (File::exists($destinationPath)) {
            File::delete($destinationPath);
        }
        $deletecar -> delete();
        Session::flash('status','You`ve successfully deleted a car!');
        return redirect('/all-vehicles')->with('deletecar', $deletecar); 

    }

    public function save(Request $request)
    {
        $addcar = $request->all();
        if ($image = $request->file('carphoto')) {
            $destinationPath = 'images/uploads/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $addcar['carphoto'] = "$profileImage";
        }
        AddCar::create($addcar);
        return redirect('/add')->with('status', 'You`ve Successfully Added a New Car!');  



    }
}
