<?php
namespace App\Helpers;

use App\Models\Accounts\Members;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

trait CheckStaffAccessByArea {

    public function checkMemberAccess($account_no)
    {
        if(Auth::user()->hasRole('field-officer')){
            $area_id = Auth::user()->staff->area->id;

           $member = Members::select('area_id')->where('account',$account_no)->first();

            if($member->area_id != $area_id){
                Redirect::to(url()->previous())->with(toastr()->error('You are not allowed to access this member'))->send();
                return abort(403);
            }
        }
    }

    public function checkMemberAccessView($account_no)
    {
        if(Auth::user()->hasRole('field-officer')){
            $area_id = Auth::user()->staff->area->id;

           $member = Members::select('area_id')->where('account',$account_no)->first();

            if($member->area_id != $area_id){
                abort(403, 'Member account access restricted');
            }
        }
    }

}
