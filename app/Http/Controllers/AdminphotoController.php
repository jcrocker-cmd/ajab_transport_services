<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Adminphoto;


class AdminphotoController extends Controller
{
    public function save(Request $request)
    {
        $pp = new Adminphoto();
        $pp ->adminpp = $request->input('adminpp');
        // $pp = $request->all();
        $pp ->save();
        return redirect()->back();

    }
 
}
