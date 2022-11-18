<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Adminphoto;
use App\Models\AdminInfo;


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

    public function admin_update_info (Request $request, $id)
    {
        $adminInfo = AdminInfo::find($id);
        $input = $request->all();
        $adminInfo->update($input);
        return view('dashboard.settings')->with('adminInfo', $adminInfo); 

    }

    public function admin_view_info()
    {
        $adminInfo = AdminInfo::all();
        return view ('dashboard.settings')->with('adminInfo', $adminInfo);
    }
 
}
