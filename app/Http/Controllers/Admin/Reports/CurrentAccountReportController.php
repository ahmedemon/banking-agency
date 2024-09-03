<?php

namespace App\Http\Controllers\Admin\Reports;

use App\Http\Controllers\Controller;
use App\Models\Accounts\CurrentAccount;
use App\Models\Accounts\Members;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CurrentAccountReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($account)
    {
        $member = Members::where('account', $account)->with('currentAccount')->first();
        // $currentAccount = CurrentAccount::where('account', $account)->where('status', '!=', 0)->get();
        return view('reports.current_account.index', compact('member'));
    }

    public function caccountSearch()
    {
        return view('reports.current_account.search');
    }

    public function searchAccount(Request $request)
    {
        $request->validate(['account' => 'required']);

        $member = Members::where('account', $request->account)->first();

        if(!$member){
            return redirect()->back()->with(Toastr::error("Account did not found"));
        }

        // who has the permission to access all members
        if (Auth::user()->hasRole(['admin','manager'])) {
            return redirect()->route('report.caccount.index', $request->account);
        }

        // who has the permission to access only field officer
        $activeUser = Auth::user()->staff;
        // return $member->area_id . $activeUser->area->id;
        if ($member->area_id == $activeUser->area->id) {
            return redirect()->route('report.caccount.index', $request->account);
        }

        return redirect()->back()->with(Toastr::warning('You`ve no permission to this user!', 'Warning'));
    }
}
