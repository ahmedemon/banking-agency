<?php

namespace App\Http\Controllers\Admin\Reports;

use App\Http\Controllers\Controller;
use App\Models\Accounts\Loan;
use App\Models\Accounts\Members;
use App\Models\LoanInstallments;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoanReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($account)
    {
        // $members = Members::where('account', $account)->with('loans')->get();
        $loans = Loan::where('account_id', $account)->with('installments')->get();
        // $loan = Loan::where('account_id', $account)->with('installments')->first();
        // $installments = LoanInstallments::where('loan_id', $loan->id)->get();
        return view('reports.loan.index', compact('loans'));
    }
    public function loanSearch()
    {
        return view('reports.loan.search');
    }

    public function loanSearchAccount(Request $request)
    {
        $request->validate(['account' => 'required']);

        $member = Members::where('account', $request->account)->first();

        if(!$member){
            return redirect()->back()->with(Toastr::error("Account did not found"));
        }

        $loan = Loan::where('account_id', $request->account)->first();
        if(!$loan){
            return redirect()->back()->with(Toastr::error("This account have not any loan yet."));
        }

        // who has the permission to access all members
        if (Auth::user()->hasRole(['admin','manager'])) {
            return redirect()->route('report.loan.index', $request->account);
        }

        // who has the permission to access only field officer
        $activeUser = Auth::user()->staff;
        // return $member->area_id . $activeUser->area->id;
        if ($member->area_id == $activeUser->area->id) {
            return redirect()->route('report.loan.index', $request->account);
        }


        return redirect()->back()->with(Toastr::warning('You`ve no permission to this user!', 'Warning'));
    }
}
