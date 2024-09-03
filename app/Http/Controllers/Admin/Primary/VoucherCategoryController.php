<?php

namespace App\Http\Controllers\Admin\Primary;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Primary\VoucherCategory;
use Brian2694\Toastr\Facades\Toastr;


class VoucherCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vouchers = VoucherCategory::orderBy('type')->get();
        return view('Primary.VoucherCategory.index', compact('vouchers'));
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
            'type' => 'required',
            'name' => 'required',
            'active' => 'required',
            // 'voucher_link' => '',
        ]);
        $voucher = new VoucherCategory($request->all());
        $voucher->save();
        return redirect()->back()->with(Toastr::success('Voucher category added successfully!'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $voucher = VoucherCategory::find($id);
        return view('Primary.VoucherCategory.edit', compact('voucher'));
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
            'type' => 'required',
            'name' => 'required',
            'active' => 'required',
        ]);

        VoucherCategory::find($id)->update($request->except('_token', '_method'));

        return redirect()->route('voucher.category.index')->with(Toastr::success('Voucher category added successfully!'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $voucher = VoucherCategory::find($id);
        $voucher->delete();
        return redirect()->back()->with('delete', 'Voucher category deleted successfully!');
    }

    public function active($id)
    {
        $active = VoucherCategory::find($id);
        $active->active = "1";
        $active->save();
        return redirect()->back()->with('active', 'Voucher category activated successfully!');
    }

    public function inactive($id)
    {
        $inactive = VoucherCategory::find($id);
        $inactive->active = "0";
        $inactive->save();
        return redirect()->back()->with('inactive', 'Voucher category inactivated successfully!');
    }
}
