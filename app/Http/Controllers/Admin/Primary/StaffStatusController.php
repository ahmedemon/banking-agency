<?php

namespace App\Http\Controllers\Admin\Primary;

use Illuminate\Http\Request;
use App\Models\Primary\Staffs;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class StaffStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $status = Staffs::all();
        return view('Primary.staff.status.index', compact('status'));
    }


    public function active($id)
    {
        $status_active = Staffs::find($id);
        $status_active->active = "1";
        $status_active->save();
        return redirect()->back()->with(Toastr::success('Staff Activate!'));
    }
    public function inactive($id)
    {
        $status_inactive = Staffs::find($id);
        $status_inactive->active = "0";
        $status_inactive->save();
        return redirect()->back()->with(Toastr::success('Staff Inactive!'));
    }
}
