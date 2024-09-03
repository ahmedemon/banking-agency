<?php

namespace App\Http\Controllers\Admin\Reports;

use App\Http\Controllers\Controller;
use App\Models\Accounts\Members;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class GeneralReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($account)
    {
        $member = Members::where('account', $account)->with('generalAc')->first();
        // $account_transaction = GeneralAcTransactions::where('account', $member->account)->get();

        $genActrans = DB::select("SELECT ifnull(deposit,0) deposit, ifnull(withdraw,0) withdraw, profit, `date`, note,
                        (SELECT ifnull(sum(deposit),0)-ifnull(sum(withdraw),0) balance
                            from general_ac_transactions where account = gt.account and `date` <= gt.`date` and deleted_at is null) as balance
                        from general_ac_transactions gt where account = $member->account and deleted_at is null order by `date` desc");

        return view('reports.general.index', compact('member', 'genActrans'));
    }


    public function generalSearch()
    {
        return view('reports.general.search');
    }

    public function generalSearchAccount(Request $request)
    {
        $request->validate(['account' => 'required']);

        $member = Members::select('area_id')->where('account', $request->account)->first();

        if(!$member){
            return redirect()->back()->with(Toastr::error("Account not found", "Error"));
        }

        // who has the permission to access all members
        if (Auth::user()->hasRole(['admin','manager'])) {
            return redirect()->route('report.general.index', $request->account);
        }

        // who has the permission to access only field officer
        $activeUser = Auth::user()->staff;
        if ($member->area_id == $activeUser->area->id) {
            return redirect()->route('report.general.index', $request->account);
        }

        return redirect()->back()->with(Toastr::warning('You`ve no permission to this user!', 'Warning'));
    }
}
