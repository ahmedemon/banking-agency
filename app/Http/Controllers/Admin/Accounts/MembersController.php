<?php

namespace App\Http\Controllers\Admin\Accounts;

use App\Helpers\FileManager;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Accounts\Members;
use App\Models\Primary\Area;
use Brian2694\Toastr\Facades\Toastr;

class MembersController extends Controller
{

    public function index()
    {

        $keyword = request()->has('search') ? request()->query('search') : '';

        if(Auth()->user()->hasRole('admin|manager')){
            if (request()->has('search')) {
                $members = Members::where('m_name','like', "%$keyword%")->orWhere('account','like', "%$keyword%")->with(['area'])->latest()->paginate();
            } else {
                $members = Members::with('area')->orderBy('account')->paginate(10);
            }
        }else{
            $area_id = Auth()->user()->staff->area->id;

            if (request()->has('search')) {
                $members = Members::where('area_id', $area_id)->whereRaw('(m_name like ? OR account like ?)', ["%$keyword%", "%$keyword%"])->with(['area'])->latest()->paginate();
            } else {
                $members = Members::where('area_id', $area_id)->with('area')->orderBy('account')->paginate(10);
            }
        }

        return view('Accounts.Members.index', compact('members'));
    }


    public function create()
    {

        if(Auth()->user()->hasRole('admin|manager')){
            $areas = Area::all(['id', 'name']);
        }else{
            $areas = Auth()->user()->staff->area()->get();
        }


        $last_account_num = DB::table('members')->max('account') + 1;

        return view('Accounts.Members.create', compact('areas','last_account_num'));
    }


    public function store(Request $request)
    {

        $this->validate($request, [
            'area_id'     => 'required|min:1|max:50',
            'm_name'      => 'required',
            'm_mobile'    => 'nullable|numeric',
            'm_birthday'  => 'nullable|date',
            'm_father'    => 'nullable|string',
            'm_mother'    => 'nullable|string',
            'm_companion' => 'nullable|string',
            'm_nid'       => 'nullable|integer',
            'email'       => 'nullable|email',
            'account'     => 'required|unique:members,account',

        ],[
            'area_id'     => ['required' => 'Area is required'],
            'm_name'      => ['required'=> 'Member name is required'],
            'm_mobile'    => ['numeric'=>'Mobile number must be a number'],
            'm_birthday'  => ['date'=>'Birthday should be a date'],
            'm_father'    => ['string'=>'Father\'s name must be a string'],
            'm_mother'    => ['string'=>'Mother\'s name must be a string'],
            'm_companion' => ['string'=>'Companion name must be a string'],
            'm_nid'       => ['integer'=>'NID number must be a number'],
        ],[
            'account'   => 'Account no.',
        ]);

        $last_account_num = DB::table('members')->max('account') + 1;

        $member = new Members();
        $member->area_id     = $request->area_id;
        $member->m_name     = $request->m_name;
        $member->m_mobile   = $request->m_mobile;
        $member->m_birthday = $request->m_birthday;
        $member->m_father   = $request->m_father;
        $member->m_mother   = $request->m_mother;
        $member->m_companion = $request->m_companion;
        $member->m_nid      = $request->m_nid;
        $member->m_gender   = $request->m_gender;
        $member->email      = $request->email;
        $member->second_mobile = $request->second_mobile;
        $member->profession = $request->profession;
        $member->business   = $request->business;
        $member->m_village  = $request->m_village;
        $member->m_post     = $request->m_post;
        $member->m_thana    = $request->m_thana;
        $member->m_district = $request->m_district;

        if($request->has('same')){
            $member->p_village  = $request->m_village;
            $member->p_post     = $request->m_post;
            $member->p_thana    = $request->m_thana;
            $member->p_district = $request->m_district;
        } else {
            $member->p_village  = $request->p_village;
            $member->p_post     = $request->p_post;
            $member->p_thana    = $request->p_thana;
            $member->p_district = $request->p_district;
        }

        $file = new FileManager();
        // member photo start
        if ($request->hasFile('m_photo')) {
            $m_photo = $request->file('m_photo');

            $file->folder('members')->prefix('member-photo')
                ->upload($m_photo);
            $member->m_photo = $file->getName();
        }
        // member photo end

        // member signature starts
        if ($request->hasFile('m_signature')) {
            $m_signature = $request->file('m_signature');

            $file->folder('members')->prefix('member-signature')
                ->upload($m_signature);
            $member->m_signature = $file->getName();
        }
        // member signature end

        // member NID start
        if ($request->hasFile('nid_attachment')) {
            $nid_attachment = $request->file('nid_attachment');

            $file->folder('members')->prefix('member-nid')
                ->upload($nid_attachment);
            $member->nid_attachment = $file->getName();
        }
        // member NID end

        // nominee photo start
        if ($request->hasFile('n_photo')) {
            $n_photo = $request->file('n_photo');
            $file->folder('members/nominee')->prefix('nominee')
                ->upload($n_photo);
            $member->n_photo = $file->getName();
        }
        // nominee photo end

        $member->admission_fee  = $request->admission_fee;
        $member->form_fee       = $request->form_fee;
        $member->regular_savings = $request->regular_savings ?? 50;
        $member->join           = $request->join;
        // $member->account        = ($request->account == $last_account_num) ? $request->account : $last_account_num;
        $member->account        = $request->account;
        $member->active         = $request->active;
        $member->n_name         = $request->n_name;
        $member->n_relation     = $request->n_relation;
        $member->n_father       = $request->n_father;
        $member->n_mother       = $request->n_mother;
        $member->n_nid          = $request->n_nid;
        $member->n_mobile       = $request->n_mobile;

        $member->n_village  = $request->n_village;
        $member->n_post     = $request->n_post;
        $member->n_thana    = $request->n_thana;
        $member->n_district = $request->n_district;
        $member->save();
        // return $request->all();
        return redirect()->route('members.index')->with(Toastr::success('Member Added Successfully!','Success'));
    }


    public function show($id) {
        $member = Members::find($id);
        return view('Accounts.Members.view', compact('member'));
    }


    public function edit($id) {
        $member = Members::find($id);
        $areas = Area::all(['id', 'name']);
        return view('Accounts.Members.edit', compact('member','areas'));
    }


    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'area_id'     => 'required|min:1|max:50',
            'm_name'      => 'required',
            'm_mobile'    => 'nullable|numeric',
            'm_birthday'  => 'nullable|date',
            'm_father'    => 'nullable|string',
            'm_mother'    => 'nullable|string',
            'm_companion' => 'nullable|string',
            'm_nid'       => 'nullable|integer',
            'email'       => 'nullable|email',

        ],[
            'area_id'     => ['required' => 'Area is required'],
            'm_name'      => ['required'=> 'Member name is required'],
            'm_mobile'    => ['numeric'=>'Mobile number must be a number'],
            'm_birthday'  => ['date'=>'Birthday should be a date'],
            'm_father'    => ['string'=>'Father\'s name must be a string'],
            'm_mother'    => ['string'=>'Mother\'s name must be a string'],
            'm_companion' => ['string'=>'Companion name must be a string'],
            'm_nid'       => ['integer'=>'NID number must be a number'],
        ]);

        $member = Members::find($id);
        $member->area_id     = $request->area_id;
        $member->m_name     = $request->m_name;
        $member->m_mobile   = $request->m_mobile;
        $member->m_birthday = $request->m_birthday;
        $member->m_father   = $request->m_father;
        $member->m_mother   = $request->m_mother;
        $member->m_companion = $request->m_companion;
        $member->m_nid      = $request->m_nid;
        $member->m_gender   = $request->m_gender;
        $member->email      = $request->email;
        $member->second_mobile = $request->second_mobile;
        $member->profession = $request->profession;
        $member->business   = $request->business;
        $member->m_village  = $request->m_village;
        $member->m_post     = $request->m_post;
        $member->m_thana    = $request->m_thana;
        $member->m_district = $request->m_district;

        if($request->has('same')){
            $member->p_village  = $request->m_village;
            $member->p_post     = $request->m_post;
            $member->p_thana    = $request->m_thana;
            $member->p_district = $request->m_district;
        } else {
            $member->p_village  = $request->p_village;
            $member->p_post     = $request->p_post;
            $member->p_thana    = $request->p_thana;
            $member->p_district = $request->p_district;
        }

        $file = new FileManager();
        // member photo start
        if ($request->hasFile('m_photo')) {
            $m_photo = $request->file('m_photo');

            $file->folder('members')->prefix('member-photo')
                ->update($m_photo, $member->m_photo);
            $member->m_photo = $file->getName();
        }
        // member photo end

        // member signature starts
        if ($request->hasFile('m_signature')) {
            $m_signature = $request->file('m_signature');

            $file->folder('members')->prefix('member-signature')
                ->update($m_signature, $member->m_signature);
            $member->m_signature = $file->getName();
        }
        // member signature end

        // member NID start
        if ($request->hasFile('nid_attachment')) {
            $nid_attachment = $request->file('nid_attachment');

            $file->folder('members')->prefix('member-nid')
                ->update($nid_attachment, $member->nid_attachment);
            $member->nid_attachment = $file->getName();
        }
        // member NID end

        // nominee photo start
        if ($request->hasFile('n_photo')) {
            $n_photo = $request->file('n_photo');
            $file->folder('members/nominee')->prefix('nominee')
                ->update($n_photo, $member->n_photo);
            $member->n_photo = $file->getName();
        }
        // nominee photo end

        $member->admission_fee  = $request->admission_fee;
        $member->form_fee       = $request->form_fee;
        $member->regular_savings = $request->regular_savings ?? 50;
        $member->join           = $request->join;
        $member->account        = $request->account;
        $member->active         = $request->active;
        $member->n_name         = $request->n_name;
        $member->n_relation     = $request->n_relation;
        $member->n_father       = $request->n_father;
        $member->n_mother       = $request->n_mother;
        $member->n_nid          = $request->n_nid;
        $member->n_mobile       = $request->n_mobile;

        $member->n_village  = $request->n_village;
        $member->n_post     = $request->n_post;
        $member->n_thana    = $request->n_thana;
        $member->n_district = $request->n_district;
        $member->save();
        // return $request->all();
        return redirect()->route('members.index')->with(Toastr::success('Member updated Successfully!','Success'));
    }

    public function destroy($id)
    {
        $memeber = Members::find($id);

        $file = new FileManager();
        $file->folder('members')->delete($memeber->m_photo);
        $file->folder('members')->delete($memeber->m_signature);
        $file->folder('members')->delete($memeber->nid_attachment);
        $file->folder('members/nominee')->delete($memeber->n_photo);

        $memeber->delete();
        return redirect()->back()->with(Toastr::success('Member deleted successfully!','Deleted'));
    }
}
