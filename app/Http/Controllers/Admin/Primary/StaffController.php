<?php

namespace App\Http\Controllers\Admin\Primary;

use App\Helpers\FileManager;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Primary\Staffs;
use App\Models\Primary\StaffRole;
use App\Models\Primary\BranchList;
use Brian2694\Toastr\Facades\Toastr;

class StaffController extends Controller
{

    protected $rules = [
        'join' => 'required',
        'name' => 'required|min:2|max:50',
        'birthday' => 'required',
        'father' => 'nullable|min:2|max:50',
        'mother' => 'nullable|min:2|max:50',
        'nid' => 'nullable|numeric',
        'gender' => 'nullable|string',
        'mobile' => 'nullable|numeric|min:11|max:11',
        'address' => 'nullable|min:2|max:200',
        'designation' => 'nullable|min:2|max:150',
        'picture' => 'nullable',
        'sign' => 'nullable',
        'user_role' => 'required',
        'branch' => 'required',
        'active' => 'nullable|string',
        'interview' => 'nullable|string',
        'security_money' => 'nullable|numeric',
        'salary' => 'nullable|numeric',
        'house' => 'nullable|numeric',
        'medical' => 'nullable|numeric',
        'convenience' => 'nullable|numeric',
        'transport' => 'nullable|numeric',
        'mobile_bill' => 'nullable|numeric',
    ];

    public function index()
    {
        $staffs = Staffs::with('role')->paginate(10);
        return view('Primary.staff.index', compact('staffs'));
    }


    public function create()
    {
        $allBranch = BranchList::all();
        $allRoles = StaffRole::all();
        return view('Primary.staff.create', compact('allRoles', 'allBranch'));
    }


    public function store(Request $request)
    {
        $this->validate($request, $this->rules);

        $addStaff = new Staffs();
        $addStaff->join = $request->join;
        $addStaff->name = $request->name;
        $addStaff->birthday = $request->birthday;
        $addStaff->father = $request->father;
        $addStaff->mother = $request->mother;
        $addStaff->nid = $request->nid;
        $addStaff->gender = $request->gender;
        $addStaff->mobile = $request->mobile;
        $addStaff->address = $request->address;
        $addStaff->designation = $request->designation;

        $upload = new FileManager();

        // staff image start
        if ($request->hasFile('picture')) {
            $picture = $request->file('picture');

            $upload->folder('staff')->prefix('profile')->upload($picture);
            $addStaff->picture = $upload->getName();
        }
        // staff image end

        // staff signature starts
        if ($request->hasFile('sign')) {
            $sign = $request->file('sign');

            $upload->folder('staff')->prefix('sign')->upload($sign);
            $addStaff->sign = $upload->getName();
        }
        // staff signature end

        $addStaff->publish = $request->publish;
        $addStaff->user_role = $request->user_role;
        $addStaff->branch = $request->branch;
        $addStaff->active = $request->active;
        $addStaff->interview = $request->interview;
        $addStaff->security_money = $request->security_money;
        $addStaff->salary = $request->salary;
        $addStaff->house = $request->house;
        $addStaff->medical = $request->medical;
        $addStaff->convenience = $request->convenience;
        $addStaff->transport = $request->transport;
        $addStaff->mobile_bill = $request->mobile_bill;

        $addStaff->save();

        return redirect()->route('staff.index')->with(Toastr::success('Staff added successfully!', 'Added'));
    }


    public function show($id)
    {
        $staff = Staffs::find($id);
        return view('Primary.staff.view', compact('staff'));
    }


    public function edit($id)
    {
        $allbranch = BranchList::all();
        $allRoles = StaffRole::all();
        $editStaff = Staffs::find($id);
        return view('Primary.staff.edit', compact('editStaff', 'allRoles', 'allbranch'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, $this->rules);

        $editStaff = Staffs::find($id);
        $editStaff->join    = $request->join;
        $editStaff->name    = $request->name;
        $editStaff->birthday = $request->birthday;
        $editStaff->father = $request->father;
        $editStaff->mother = $request->mother;
        $editStaff->nid = $request->nid;
        $editStaff->gender = $request->gender;
        $editStaff->mobile = $request->mobile;
        $editStaff->address = $request->address;
        $editStaff->designation = $request->designation;

        $file = new FileManager();

        // staff image start
        if ($request->hasFile('picture')) {
            $picture = $request->file('picture');

            $file->folder('staff')->prefix('profile')->update($picture, $editStaff->picture);
            $editStaff->picture = $file->getName();
        }
        // staff image end

        // staff signature starts
        if ($request->hasFile('sign')) {
            $sign = $request->file('sign');

            $file->folder('staff')->prefix('sign')
                ->update($sign, $editStaff->sign);
            $editStaff->sign = $file->getName();
        }
        // staff signature end

        $editStaff->publish = $request->publish;
        $editStaff->user_role = $request->user_role;
        $editStaff->branch = $request->branch;
        $editStaff->active = $request->active;
        $editStaff->interview = $request->interview;
        $editStaff->security_money = $request->security_money;
        $editStaff->salary = $request->salary;
        $editStaff->house = $request->house;
        $editStaff->medical = $request->medical;
        $editStaff->convenience = $request->convenience;
        $editStaff->transport = $request->transport;
        $editStaff->mobile_bill = $request->mobile_bill;

        $editStaff->save();

        return redirect()->route('staff.index')->with(Toastr::success('Staff update successfully!', 'Updated'));
    }

    public function padPrint($id)
    {
        $staffPad = Staffs::find($id);
        return view('Primary.staff.pad', compact('staffPad'));
    }

    public function pagePrint($id)
    {
        $staffPage = Staffs::find($id);
        return view('Primary.staff.pagePrint', compact('staffPage'));
    }

    public function idPrint($id)
    {
        $staffID = Staffs::find($id);
        return view('Primary.staff.idPrint', compact('staffID'));
    }


    public function destroy($id)
    {
        $staff= Staffs::find($id);

        $file = new FileManager();
        $file->folder('staff')->delete($staff->picture);
        $file->folder('staff')->delete($staff->sign);
        // delete old image

        $staff->delete();
        return redirect()->back()->with(Toastr::warning('Staff deleted!', 'Deleted'));
    }
}
