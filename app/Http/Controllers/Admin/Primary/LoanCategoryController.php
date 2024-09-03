<?php

namespace App\Http\Controllers\Admin\Primary;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Primary\LoanCategory;
use Brian2694\Toastr\Facades\Toastr;

class LoanCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $loan_categories = LoanCategory::latest()->get();
        return view('Primary.loanCategory.index', compact('loan_categories'));
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
            'interest_rate' => 'required',
            'duration' => 'required',
            'max_amount' => 'required',
        ]);
        $loan_category = new LoanCategory($request->all());
        $loan_category->save();
        return redirect()->route('loancategory.index')->with(Toastr::success('Loan category added successfully!'));
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
        $edit_category = LoanCategory::find($id);
        return view('Primary.loanCategory.edit', compact('edit_category'));
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
            'interest_rate' => 'required',
            'duration' => 'required',
            'max_amount' => 'required',
        ]);
        $loan_category = LoanCategory::find($id);
        LoanCategory::where('id', '=', $loan_category->id)->update($request->except('_token', '_method'));
        $loan_category->save();
        return redirect()->route('loancategory.index')->with(Toastr::success('Loan category added successfully!'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete_category = LoanCategory::find($id);
        $delete_category->delete();
        return redirect()->back()->with('delete', 'Voucher delete successfully!');
    }
}
