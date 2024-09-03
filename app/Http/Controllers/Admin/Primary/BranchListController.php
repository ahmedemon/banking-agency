<?php

namespace App\Http\Controllers\Admin\Primary;

use Illuminate\Http\Request;
use App\Models\Primary\BranchList;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class BranchListController extends Controller
{

    public function index()
    {
        $branchs = BranchList::orderBy('name')->paginate(10);
        return view('Primary.branch-list.index', compact('branchs'));
    }

    public function create()
    {
        return view('Primary.branch-list.create');
    }

    public function store(Request $request)
    {
        $this-> validate($request, [
            'name' => 'required|string',
        ]);

        $barnch = new BranchList();
        $barnch->name    = $request->name;
        $barnch->address = $request->address;
        $barnch->hotline = $request->hotline;
        $barnch->save();

        return redirect()->route('branch-list.index')->with(Toastr::success('Branch added successfully!','Success'));
    }

    public function update($id)
    {

    }

    public function delete($id)
    {
        $branch = BranchList::find($id);
        $branch->delete();
        return redirect()->route("branch-list.index")->with(Toastr::success("Branch deleted successfully",'Success'));
    }

}
