<?php

namespace App\Http\Controllers\Admin\Credit;

use App\Helpers\CheckStaffAccessByArea;
use App\Http\Controllers\Controller;
use App\Models\Accounts\Members;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CommonCollectionController extends Controller
{
    use CheckStaffAccessByArea;

    public function index($account)
    {
        $member = Members::where('account', $account)->first();

        $this->checkMemberAccessView($account);

        Session::put('goto_url', url()->current());

        return view('credits.common.index', compact('member'));
    }

    public function search()
    {
        return view('credits.common.search');
    }

    public function postSearch(Request $request)
    {
        $request->validate(['account' => 'required']);

        $this->checkMemberAccess($request->account);

        $member = Members::where('account', $request->account)->count();

        if(empty($member)){
            return redirect()->back()->with(Toastr::error("No member found with given the account number ", 'Error!'));
        }

        return redirect()->route('credits.common.index', $request->account);
    }
}
