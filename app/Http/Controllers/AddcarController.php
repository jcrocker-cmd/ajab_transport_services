<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AddCar;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
// use App\Models\User;
use App\Models\User;
use App\Models\Booking;
use App\Models\AdminInfo;
use Artisan;

class AddCarController extends Controller
{
    public function main_allcars()
    {
        $addcar = AddCar::all();

        $data = array();
        if(Session::has('loginId'))
        {
        $data = User::where('id','=',Session::get('loginId'))->first();

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

    public function main_viewvehicle($slug)
    {
        $data = array();
        if(Session::has('loginId'))
        {
        $data = User::where('id','=',Session::get('loginId'))->first();

        }

        $viewcar = AddCar::where('slug', $slug)->first();
        return view ('main.viewcar',compact('data'))->with('viewcar', $viewcar);
    }

    public function db_allvehicles()
    {
        $addcar = AddCar::orderByDesc('created_at')->get();
        return view ('dashboard.all-vehicles',compact('addcar'));
    }

    public function db_rentedcars()
    {
        $rented = Booking::with('car')->get();
        $data = array();
        if(Session::has('loginId')){
        $data = AdminInfo::where('id','=',Session::get('loginId'))->first();}
        return view('dashboard.rented-cars',compact('data','rented'));
    }

    public function db_rented_ajaxview($id)
    {
        $rented = Booking::with('car')->find($id);
        $front_license = asset('images/license/front/' . $rented->front_license);
        $back_license = asset('images/license/back/' . $rented->back_license);
        return response()->json([
            'status' => 200,
            'rented' => $rented,
            'front_license' => $front_license,
            'back_license' => $back_license,
        ]);
    }

    public function db_availablecars()
    {
        $available = AddCar::all();
        $data = array();
        if(Session::has('loginId')){
        $data = AdminInfo::where('id','=',Session::get('loginId'))->first();}
        return view('dashboard.available-cars',compact('data','available'));
    }

    public function db_viewvehicle($slug)
    {
        $data = array();
        if(Session::has('loginId')){
        $data = AdminInfo::where('id','=',Session::get('loginId'))->first();}
        $addcar = AddCar::where('slug', $slug)->first();
        return view ('dashboard.viewcar',compact('data'))->with('addcar', $addcar);
    }

    public function db_editcar($slug)
    {
        $data = array();
        if(Session::has('loginId')){
        $data = AdminInfo::where('id','=',Session::get('loginId'))->first();}
        $editcar = AddCar::where('slug', $slug)->first();
        return view('dashboard.editcar',compact('data'))->with('editcar', $editcar);
    }

    public function db_updatecar(Request $request, $slug)
    {
        $data = array();
        if(Session::has('loginId')){
        $data = AdminInfo::where('id','=',Session::get('loginId'))->first();}

        $addcar = AddCar::where('slug', $slug)->first();
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
        $updatedSlug = $addcar->slug;
        Session::flash('message','You`ve successfully edited your exisiting car!');
        // return redirect('/viewcar/' . $updatedSlug)->with(compact('data', 'addcar'));
        // return redirect()->route('dashboard.viewcar', $updatedSlug)->with(compact('data', 'addcar'));

         // Clear the cache
        Artisan::call('cache:clear');
        return redirect('/viewcar/' . $updatedSlug)->with(compact('data', 'addcar'))->header('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0')->header('Pragma', 'no-cache')->header('Expires', 'Sat, 01 Jan 1990 00:00:00 GMT');
    }

    // public function delete_car($id)
    // {
    //     $deletecar = AddCar::find($id);
    //     $destinationPath = 'images/uploads/'.$deletecar->carphoto;
    //     if (File::exists($destinationPath)) {
    //         File::delete($destinationPath);
    //     }
    //     $deletecar -> delete();
    //     Session::flash('status','You`ve successfully deleted a car!');
    //     return redirect('/all-vehicles')->with('deletecar', $deletecar); 
    // }

    public function delete_car($id)
    {
        $deletecar = AddCar::find($id);
        // $destinationPath = 'images/uploads/'.$deletecar->carphoto;
        // if (File::exists($destinationPath)) {
        //     File::delete($destinationPath);
        // }
        $deletecar->is_active = false;
        $deletecar->save();
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

    public function main_search_rental(Request $request)
    {

        $data = array();
        if(Session::has('loginId'))
        {
        $data = User::where('id','=',Session::get('loginId'))->first();

        }

        // Get the search term from the request
        $searchTerm = $request->input('search');


        // Query the database to search for cars by model or brand
        $cars = AddCar::where('model', 'like', '%' . $searchTerm . '%')
        ->orWhere('brand', 'like', '%' . $searchTerm . '%')
        ->orWhere('year', 'like', '%' . $searchTerm . '%')
        ->orWhere('transmission', 'like', '%' . $searchTerm . '%')
        ->orWhere('dailyrate', 'like', '%' . $searchTerm . '%')
        ->orWhere('weeklyrate', 'like', '%' . $searchTerm . '%')
        ->orWhere('monthlyrate', 'like', '%' . $searchTerm . '%')
        ->get();


        // Return the search results to the view
        return view('main.search-car', compact('cars', 'searchTerm','data'));
    }

}
