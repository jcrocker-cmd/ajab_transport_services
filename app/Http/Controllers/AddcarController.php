<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AddCar;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use App\Models\Signin;
use App\Models\AdminInfo;

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

    public function addcar_route()
    {
        $data = array();
        if(Session::has('loginId')){
        $data = AdminInfo::where('id','=',Session::get('loginId'))->first();}
        return view('dashboard.add-car',compact('data'));
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
        $data = array();
        if(Session::has('loginId'))
        {
        $data = AdminInfo::where('id','=',Session::get('loginId'))->first();
        }
        $addcar = AddCar::all();
        return view ('dashboard.all-vehicles',compact('data'))->with('addcar', $addcar);
    }

    public function db_rentedcars()
    {
        $data = array();
        if(Session::has('loginId')){
        $data = AdminInfo::where('id','=',Session::get('loginId'))->first();}
        return view('dashboard.rented-cars',compact('data'));
    }

    public function db_viewvehicle($id)
    {
        $data = array();
        if(Session::has('loginId')){
        $data = AdminInfo::where('id','=',Session::get('loginId'))->first();}
        $addcar = AddCar::find($id);
        return view ('dashboard.viewcar',compact('data'))->with('addcar', $addcar);
    }

    public function db_editcar($id)
    {
        $data = array();
        if(Session::has('loginId')){
        $data = AdminInfo::where('id','=',Session::get('loginId'))->first();}
        $editcar = AddCar::find($id);
        return view('dashboard.editcar',compact('data'))->with('editcar', $editcar);
    }

    public function db_updatecar(Request $request, $id)
    {
        $data = array();
        if(Session::has('loginId')){
        $data = AdminInfo::where('id','=',Session::get('loginId'))->first();}

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
        return view('dashboard.viewcar',compact('data'))->with('addcar', $addcar); 
        
        
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

    public function db_notification()
    {
        $data = array();
        if(Session::has('loginId')){
        $data = AdminInfo::where('id','=',Session::get('loginId'))->first();}
        return view ('dashboard.notification',compact('data'));
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
