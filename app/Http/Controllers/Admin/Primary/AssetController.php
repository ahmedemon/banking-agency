<?php

namespace App\Http\Controllers\Admin\Primary;

use App\Http\Controllers\Controller;
use App\Models\Primary\Asset;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Helpers\FileManager;
class AssetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $assets = Asset::latest()->get();
        return view('Primary.asset.index', compact('assets'));
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
            'date_of_purchase' => 'required',
            'retired_date' => 'nullable',
            'asset_in_year' => 'nullable',
            'category' => 'required',
            'branch' => 'required',
            'item_name' => 'required',
            'condition' => 'required',
            'description' => 'nullable',
            'product_cost' => 'required',
            'model_number' => 'nullable',
            'warrenty_gurentee' => 'nullable',
            'warrent_duration_month' => 'required',
            'supplier_name' => 'nullable',
            'dept_type' => 'nullable',
            'percent' => 'nullable',
            'serial' => 'nullable',
            'capture' => 'nullable',
            'manual_number' => 'nullable',
            'vou_scan_copy' => 'nullable',
        ]);
        $add_asset = new Asset($request->except('_token', '_method', 'capture', 'vou_scan_copy'));
        $upload = new FileManager();
        // asset capture start
        if ($request->hasFile('capture')) {
            $capture = $request->file('capture');

            $upload->folder('asset')->prefix('profile')->upload($capture);
            $add_asset->capture = $upload->getName();
        }
        // asset capture end

        // asset capture start
        if ($request->hasFile('vou_scan_copy')) {
            $vou_scan_copy = $request->file('vou_scan_copy');

            $upload->folder('asset')->prefix('profile')->upload($vou_scan_copy);
            $add_asset->vou_scan_copy = $upload->getName();
        }
        // asset capture end
        $add_asset->save();
        return redirect()->back()->with(Toastr::success('Asset added successfully!', 'Success'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $view_asset = Asset::find($id);
        return view('Primary.asset.view', compact('view_asset'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit_asset = Asset::find($id);
        return view('Primary.asset.edit', compact('edit_asset'));
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
        return $request->all();
        $this->validate($request, [
            'date_of_purchase' => 'required',
            'retired_date' => 'nullable',
            'asset_in_year' => 'nullable',
            'category' => 'required',
            'branch' => 'required',
            'item_name' => 'required',
            'condition' => 'required',
            'description' => 'nullable',
            'product_cost' => 'required',
            'model_number' => 'nullable',
            'warrenty_gurentee' => 'nullable',
            'warrent_duration_month' => 'required',
            'supplier_name' => 'nullable',
            'dept_type' => 'nullable',
            'percent' => 'nullable',
            'serial' => 'nullable',
            'capture' => 'nullable',
            'manual_number' => 'nullable',
            'vou_scan_copy' => 'nullable',
        ]);
        $edit_asset = Asset::find($id);
        Asset::where('id', '=', $edit_asset->id)->update($request->except('_token', '_method'));
        $upload = new FileManager();
        // asset capture start
        if ($request->hasFile('capture')) {
            $capture = $request->file('capture');

            $upload->folder('asset')->prefix('profile')->update($capture, $edit_asset->capture);
            $edit_asset->capture = $upload->getName();
        }else{
            Toastr::error('Asset updated successfully!', 'Success');
        }
        // asset capture end

        // asset capture start
        if ($request->hasFile('vou_scan_copy')) {
            $vou_scan_copy = $request->file('vou_scan_copy');

            $upload->folder('asset')->prefix('profile')->update($vou_scan_copy, $edit_asset->vou_scan_copy);
            $edit_asset->vou_scan_copy = $upload->getName();
        }else{
            Toastr::error('Asset updated successfully!', 'Success');
        }
        // asset capture end
        $edit_asset->save();
        return redirect()->route('asset.index')->with(Toastr::success('Asset updated successfully!', 'Success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete_asset = Asset::find($id);
        $delete_asset->delete();
        return redirect()->back()->with(Toastr::success('Voucher delete successfully!','Deleted'));
    }
}
