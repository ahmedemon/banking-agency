<?php

namespace App\Http\Controllers\Admin\Primary;

use App\Http\Controllers\Controller;
use App\Models\Primary\FixedDipositScheme;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;


class FixedDipositSchemeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fds = FixedDipositScheme::latest()->get();
        return view('Primary.fixed-diposit-scheme.index', compact('fds'));
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
            'type' => 'required',
            'duration' => 'required',
            'profit' => 'required',
            'note' => 'nullable',
        ]);
        $fds = new FixedDipositScheme($request->all());
        $fds->save();
        return redirect()->back()->with(Toastr::info('FDS added successfully!', 'Succeed'));
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
        $fds_edit = FixedDipositScheme::find($id);
        return view('Primary.fixed-diposit-scheme.edit', compact('fds_edit'));
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
            'type' => 'required',
            'duration' => 'required',
            'profit' => 'required',
            'note' => 'nullable',
        ]);
        $fds = FixedDipositScheme::find($id);
        FixedDipositScheme::where('id', '=', $fds->id)->update($request->except('_token', '_method'));
        $fds->save();
        return redirect()->route('fixed-diposit-scheme.index')->with(Toastr::success('FDS updated successfully!', 'Updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete_fds = FixedDipositScheme::find($id);
        $delete_fds->delete();
        return redirect()->back()->with(Toastr::warning('FDS deleted successfully!', 'Deleted'));
    }
}
