<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AddCar;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use App\Models\Signin;
use App\Models\User;
use App\Models\Booking;
use App\Models\Client_Notification;
use Artisan;
use Auth;
use App\Models\Admin_Notification;


class AddCarController extends Controller
{

    // main

    public function main_allcars()
    {
        $user_id = Auth::id();
    
        $notificationsUnread = Client_Notification::where('user_id', $user_id)
            ->whereNull('read_at')
            ->get();
        $addcar = AddCar::all();
        return view ('main.homepage',compact('addcar','notificationsUnread'));
    }

    public function main_van()
    {
        $user_id = Auth::id();
    
        $notificationsUnread = Client_Notification::where('user_id', $user_id)
            ->whereNull('read_at')
            ->get();
        $addcar = AddCar::all();
        return view ('main.van',compact('addcar','notificationsUnread'));
    }

    public function main_7seaters()
    {
        $user_id = Auth::id();
    
        $notificationsUnread = Client_Notification::where('user_id', $user_id)
            ->whereNull('read_at')
            ->get();
        $addcar = AddCar::all();
        return view ('main.7seater',compact('addcar','notificationsUnread'));
    }

    public function main_pickup()
    {
        $user_id = Auth::id();
    
        $notificationsUnread = Client_Notification::where('user_id', $user_id)
            ->whereNull('read_at')
            ->get();
        $addcar = AddCar::all();
        return view ('main.pickup',compact('addcar','notificationsUnread'));
    }

    public function main_hatchback()
    {
        $user_id = Auth::id();
    
        $notificationsUnread = Client_Notification::where('user_id', $user_id)
            ->whereNull('read_at')
            ->get();
        $addcar = AddCar::all();
        return view ('main.hatchback',compact('addcar','notificationsUnread'));
    }

    public function main_sedan()
    {
        $user_id = Auth::id();
    
        $notificationsUnread = Client_Notification::where('user_id', $user_id)
            ->whereNull('read_at')
            ->get();
        $addcar = AddCar::all();
        return view ('main.sedan',compact('addcar','notificationsUnread'));
    }

    // guest

    public function guest_allcars()
    {
        $addcar = AddCar::all();
        return view ('home.guest-homepage',compact('addcar'));
    }

    public function guest_van()
    {
        $addcar = AddCar::all();
        return view ('home.guest-van',compact('addcar'));
    }

    public function guest_7seaters()
    {
        $addcar = AddCar::all();
        return view ('home.guest-7seater',compact('addcar'));
    }

    public function guest_pickup()
    {
        $addcar = AddCar::all();
        return view ('home.guest-pickup',compact('addcar'));
    }

    public function guest_hatchback()
    {
        $addcar = AddCar::all();
        return view ('home.guest-hatchback',compact('addcar'));
    }

    public function guest_sedan()
    {
        $addcar = AddCar::all();
        return view ('home.guest-sedan',compact('addcar'));
    }




    public function addcar_route()
    {
        $notificationsUnread = Admin_Notification::whereNull('read_at')->get();
        return view('dashboard.add-car',compact('notificationsUnread'));
    }

    public function main_viewvehicle($slug)
    {
        $user_id = Auth::id();
    
        $notificationsUnread = Client_Notification::where('user_id', $user_id)
            ->whereNull('read_at')
            ->get();
        $viewcar = AddCar::where('slug', $slug)->first();
        $ratings = $viewcar->ratings()->with('user','booking')->get();
        return view ('main.viewcar',compact('viewcar','ratings','notificationsUnread'));
    }

    public function guest_viewvehicle($slug)
    {
        $viewcar = AddCar::where('slug', $slug)->first();
        $ratings = $viewcar->ratings()->with('user','booking')->get();
        return view ('home.guest-viewcar',compact('viewcar','ratings'));
    }

    public function db_allvehicles()
    {
        $notificationsUnread = Admin_Notification::whereNull('read_at')->get();
        $addcar = AddCar::orderByDesc('created_at')->get();
        return view ('dashboard.all-vehicles',compact('notificationsUnread','addcar'));
    }

    public function db_rentedcars()
    {
        $rented = Booking::with('car')->get();
        $notificationsUnread = Admin_Notification::whereNull('read_at')->get();
        return view('dashboard.rented-cars',compact('notificationsUnread','rented'));
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
        $notificationsUnread = Admin_Notification::whereNull('read_at')->get();
        return view('dashboard.available-cars',compact('notificationsUnread','available'));
    }

    public function db_viewvehicle($slug)
    {
        $notificationsUnread = Admin_Notification::whereNull('read_at')->get();
        $addcar = AddCar::where('slug', $slug)->first();
        return view ('dashboard.viewcar',compact('notificationsUnread'))->with('addcar', $addcar);
    }

    public function db_editcar($slug)
    {
        $notificationsUnread = Admin_Notification::whereNull('read_at')->get();
        $editcar = AddCar::where('slug', $slug)->first();
        return view('dashboard.editcar',compact('notificationsUnread'))->with('editcar', $editcar);
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

        $user_id = Auth::id();
    
        $notificationsUnread = Client_Notification::where('user_id', $user_id)
            ->whereNull('read_at')
            ->get();


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
        return view('main.search-car', compact('cars', 'searchTerm','notificationsUnread'));
    }

    public function guest_search_rental(Request $request)
    {

        $data = array();
        if(Session::has('loginId'))
        {
        $data = Signin::where('id','=',Session::get('loginId'))->first();

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
        return view('home.guest-search-car', compact('cars', 'searchTerm','data'));
    }


}
