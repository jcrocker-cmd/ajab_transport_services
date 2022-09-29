<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Link;

class LinkController extends Controller
{
    public function getallVehicles(Request $request)
    {
        $link = Link::get();
        return view('dashboard.all-vehicles');

    }
}
