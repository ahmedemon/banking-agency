<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SavingsScheme;
use Brian2694\Toastr\Facades\Toastr;

class SavingsSchemeController extends Controller
{
    public function getScheme()
    {
        $schemes = SavingsScheme::orderBy('distance')->get();
        return view('savings.scheme.index', compact('schemes'));
    }

    public function storeScheme(Request $request)
    {
        // return $request->all();

        $this->validate($request, [
            'name' => 'required',
            'distance' => 'required',
            'status' => 'required',
        ], [
            'name' => ['required' => 'Scheme name is required'],
            'distance' => ['required' => 'Payment sequence is required']
        ]);


        $scheme = new SavingsScheme($request->all());
        $scheme->save();

        return redirect()->route('savings.scheme.index')->with(Toastr::success("Savings scheme added successfully",'Added'));
    }

    public function editScheme($id)
    {
        $scheme = SavingsScheme::find($id);

        return view('savings.scheme.edit', compact('scheme'));
    }

    public function updateScheme(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'distance' => 'required',
            'status' => 'required',
        ], [
            'name' => ['required' => 'Scheme name is required'],
            'distance' => ['required' => 'Payment sequence is required']
        ]);

        $scheme = SavingsScheme::find($id);
        $scheme->update($request->except('_token', '_method'));

        return redirect()->route('savings.scheme.index')->with(Toastr::success("Savings scheme updated successfully","Updated"));
    }

    public function deleteScheme($id)
    {
        $scheme = SavingsScheme::find($id);
        $scheme->delete();

        return redirect()->route('savings.scheme.index')->with(Toastr::info("Savings scheme deleted successfully","Deleted"));
    }

    public function ajaxSchemeSequence(Request $request)
    {
        $scheme = SavingsScheme::find($request->id);
        return $scheme->distance;
    }
}
