<?php

namespace App\Http\Controllers;

use App\Models\Primary\Staffs;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Spatie\Permission\Models\Role;

class StaffUserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id')->get();
        return view('users.index', compact('users'));
    }

    public function create() {
        $staffs = Staffs::whereNull('user_id')->orderBy('user_role')->get();
        return view('users.create', compact('staffs'));
    }

    public function form($staffId){
        $staff = Staffs::find($staffId);

        return view('users.form', compact('staff'));
    }

    public function store(Request $request, $staffId){
        $staff = Staffs::find($staffId);

        if(!$staff){
            return redirect()->route('user.create')->with(Toastr::error('Can not find the staff in database', 'Error!'));
        }

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'regex:/^\S{6,}\z/', 'unique:users'],
            'email' => ['nullable', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        $staff->user_id = $user->id;
        $staff->save();

        $user->assignRole($staff->user_role);

        return redirect()->route('user.create')->with(Toastr::success('User created for the staff', 'Success!'));
    }

    public function delete($id)
    {
        $user = User::find($id);
        $user->staff()->update(['user_id' => null]);
        $user->delete();

        return redirect()->back()->with(Toastr::info('User deleted for the staff', 'Success!'));;
    }


    public function assignRole($userId)
    {
        $user = User::find(($userId));
        $roles = Role::all();

        return view('users.role-assign', compact('user','roles'));
    }


    public function assignRoleSave(Request $request, $userId)
    {
        $user = User::find($userId);

        // return $request;

        $user->syncRoles($request->role);

        return redirect()->route('user.index')->with(toastr()->success('Assigned role(s) succefully'));
    }


    // function to change user password
    public function changePassword()
    {
        $user = User::find(auth()->user()->id);

        return view('users.change-password', compact('user'));
    }

    // function to save new password
    public function saveNewPassword(Request $request, $userId)
    {
        $user = User::find($userId);

        $request->validate([
            'current_password' => ['required', 'string', 'min:8'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user->password = bcrypt($request->password);
        $user->save();

        return redirect()->route('dashboard')->with(toastr()->success('Password changed successfully'));
    }




    /// Role management
    public function roleCreate()
    {
        Session::flash('goto_url', url()->previous());
        // return Session::all();
        return view('users.roles.create');
    }

    public function roles()
    {
        $roles = Role::all();
        return view('users.roles.index', compact('roles'));
    }

    public function roleDelete($id)
    {
        $role = Role::find($id);
        $role->delete();

        return redirect()->back()->with(Toastr::success('Role deleted', "Success!"));
    }
}
