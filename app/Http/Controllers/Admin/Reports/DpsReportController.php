<?php

namespace App\Http\Controllers\Admin\Reports;

use App\Http\Controllers\Controller;
use App\Models\Accounts\Members;
use App\Models\Savings;
use App\Models\SavingsBalance;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DpsReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($account)
    {
        $member = Members::where('account', $account)->first();
        $savings = Savings::where('account_id', $account)->where('status', '!=', 0)->with('transactions')->get();

        return view('reports.dps.index', compact('member','savings'));
    }

    public function dpsSearch()
    {
        return view('reports.dps.search');
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
            return redirect()->route('report.dps.index', $request->account);
        }

        // who has the permission to access only field officer
        $activeUser = Auth::user()->staff;
        // return $member->area_id . $activeUser->area->id;
        if ($member->area_id == $activeUser->area->id) {
            return redirect()->route('report.dps.index', $request->account);
        }

        return redirect()->back()->with(Toastr::warning('You`ve no permission to this user!', 'Warning'));
    }
}
