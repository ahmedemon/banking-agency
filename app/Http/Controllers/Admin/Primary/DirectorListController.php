<?php

namespace App\Http\Controllers\Admin\Primary;

use File;
use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Helpers\FileManager;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Primary\DirectorList;
use Brian2694\Toastr\Facades\Toastr;

class DirectorListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $directorList = DirectorList::latest()->get();
        // return DirectorList::sum('balance');
        return view('Primary.director-list.index', compact('directorList'));
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
            'name' => 'required|string',
            'mobile' => 'required',
            'designation' => 'required|string',
            'profession' => 'required|string',
            'balance' => 'required|integer',
            'address' => 'required|string',
            'active' => 'required|string',
            'biography' => 'required|string',
            'post' => 'required|string',
            'publish' => 'required|string',
            // 'director_photo' => '',
        ]);
        $add_director = new DirectorList();
        $add_director->name = $request->name;
        $add_director->mobile = $request->mobile;
        $add_director->designation = $request->designation;
        $add_director->profession = $request->profession;
        $add_director->balance = $request->balance;
        $add_director->address = $request->address;
        $add_director->active = $request->active;
        $add_director->biography = $request->biography;
        $add_director->post = $request->post;
        $add_director->publish = $request->publish;

        $currentDate = Carbon::now()->toDateString();


        // staff image start
        if ($request->hasFile('director_photo')) {
            $director_photo = $request->file('director_photo');

            $file = new FileManager();
            $file->folder('director')->prefix('profile')->upload($director_photo);
            $add_director->director_photo = $file->getName();
        }else{
            $add_director->director_photo = "default.png";
        }

        $add_director->save();

        return redirect()->route('director-list.index')->with(Toastr::success('Director added successfully!'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $director_view = DirectorList::find($id);
        return view('Primary.director-list.view', compact('director_view'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $director_edit = DirectorList::find($id);
        // return $director_edit->toJson();
        return view('Primary.director-list.edit', compact('director_edit'));
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
            'name' => 'required|string',
            'mobile' => 'required',
            'designation' => 'required|string',
            'profession' => 'required|string',
            'balance' => 'required|integer',
            'address' => 'required|string',
            'active' => 'required|string',
            'biography' => 'required|string',
            'post' => 'required|string',
            'publish' => 'required|string',
            // 'director_photo' => '',
        ]);
        $edit_director = DirectorList::find($id);
        $edit_director->name = $request->name;
        $edit_director->mobile = $request->mobile;
        $edit_director->designation = $request->designation;
        $edit_director->profession = $request->profession;
        $edit_director->balance = $request->balance;
        $edit_director->address = $request->address;
        $edit_director->active = $request->active;
        $edit_director->biography = $request->biography;
        $edit_director->post = $request->post;
        $edit_director->publish = $request->publish;

        $currentDate = Carbon::now()->toDateString();

        // staff image start
        if ($request->hasFile('director_photo')) {
            $director_photo = $request->file('director_photo');

            $file = new FileManager();
            $file->folder('director')->prefix('profile')->update($director_photo, $edit_director->director_photo);
            $edit_director->director_photo = $file->getName();

        }

        $edit_director->save();

        return redirect()->route('director-list.index')->with(Toastr::success('Director added successfully!'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete_director= DirectorList::find($id);

        $file = new FileManager();
        $file->folder('director')->delete($delete_director->director_photo);
        // delete old image

        $delete_director->delete();
        return redirect()->back()->with('deleted', 'Member deleted successfully!');
    }
}
