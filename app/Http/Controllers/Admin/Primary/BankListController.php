<?php

namespace App\Http\Controllers\Admin\Primary;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Primary\BankList;
use Brian2694\Toastr\Facades\Toastr;

class BankListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banks = BankList::latest()->get();
        return view('Primary.banklist.index', compact('banks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'name' => 'required',
            'branch' => 'required',
            'holder' => 'required',
            'account' => 'required',
            'publish' => 'required',
            'address' => 'required',
            'balance' => 'required',
            'active' => 'required',
        ]);
        $add_bank = new BankList($request->all());
        $add_bank->save();
        return redirect()->route('banklist.index')->with(Toastr::success('Bank added successfully!','Success'));
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
        $edit_bank = BankList::find($id);
        return view('Primary.banklist.edit', compact('edit_bank'));
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
            'name' => 'required',
            'branch' => 'required',
            'holder' => 'required',
            'account' => 'required',
            'publish' => 'required',
            'address' => 'required',
            'active' => 'required',
        ]);
        $edit_bank = BankList::find($id);
        BankList::where('id', '=', $edit_bank->id)->update($request->except('_token', '_method'));
        $edit_bank->save();

        return redirect()->route('banklist.index')->with(Toastr::success('Bank updated successfully!','success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete_bank = BankList::find($id);
        $delete_bank->delete();
        return redirect()->back()->with(Toastr::info('Bank deleted successfully!','Deleted'));
    }

    public function active($id)
    {
        $active = BankList::find($id);
        $active->active = "1";
        $active->save();
        return redirect()->back()->with(Toastr::success('Bank activate successfully!', 'Success'));
    }

    public function inactive($id)
    {
        $inactive = BankList::find($id);
        $inactive->active = "0";
        $inactive->save();
        return redirect()->back()->with(Toastr::error('Bank inactivate successfully!','Success'));
    }
}
