<?php

namespace App\Http\Controllers\Admin\Primary;

use Illuminate\Http\Request;
use App\Models\Primary\StaffRole;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class StaffRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allRoles = StaffRole::all();
        return view('Primary.staff.roles.index', compact('allRoles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Session::flash('goto_url', url()->previous());
        return view('Primary.staff.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'role_designation' => 'required|min:2|max:15',
        ]);
        $role = new StaffRole();
        $role->name = Str::slug($request->role_designation);
        $role->guard_name = 'web';
        $role->role_designation = $request->role_designation;
        $role->save();
        // return redirect()->route('staff-role.index')->with(Toastr::success('Role added successfully!'));
        // Session::flash('goto_url', Session::get('goto_url'));
        return redirect()->to(Session::get('goto_url'))->with(Toastr::success('Role added successfully!'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $editRole = StaffRole::find($id);
        return view('Primary.staff.roles.edit', compact('editRole'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'role_designation' => 'required|min:2|max:15',
        ]);
        $updateRole = StaffRole::find($id);
        $updateRole->role_designation = $request->role_designation;
        $updateRole->save();
        return redirect()->route('staff-role.index')->with(Toastr::success('Designation updated successfully!'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleteRole = StaffRole::find($id);
        $deleteRole->delete();
        return redirect()->back()->with(Toastr::success('Designation deleted successfully!'));
    }
}
