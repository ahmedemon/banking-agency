<?php

namespace App\Http\Controllers\Admin\Reports;

use App\Http\Controllers\Controller;
use App\Models\Accounts\ClosingAccount;
use App\Models\Accounts\FixedDiposit;
use App\Models\Accounts\Members;
use App\Models\Savings;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FdrReportController extends Controller
{
    public function index($account)
    {
        $member = Members::where('account', $account)->with('fdr')->first();
        $fdr = FixedDiposit::where('account', $account)->with('scheme', 'profit', 'withdraw')->first();
        $closing = ClosingAccount::where('fdr_account', $account)->get();
        return view('reports.fdr.index', compact('member', 'closing'));
    }

    public function fdrSearch()
    {
        return view('reports.fdr.search');
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
            return redirect()->route('report.fdr.index', $request->account);
        }

        // who has the permission to access only field officer
        $activeUser = Auth::user()->staff;
        // return $member->area_id . $activeUser->area->id;
        if ($member->area_id == $activeUser->area->id) {
            return redirect()->route('report.fdr.index', $request->account);
        }

        return redirect()->back()->with(Toastr::warning('You`ve no permission to this user!', 'Warning'));
    }
}
