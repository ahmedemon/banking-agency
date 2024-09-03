<?php

namespace App\Http\Controllers\Admin\Accounts;

use App\Http\Controllers\Controller;
use App\Models\Accounts\ClosingAccount;
use App\Models\Accounts\FixedDiposit;
use App\Models\Accounts\Loan;
use App\Models\Accounts\LoanClosing;
use App\Models\Accounts\Members;
use App\Models\Accounts\SavingsClosing;
use App\Models\LoanInstallments;
use App\Models\Savings;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ClosingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Accounts.Closing.index');
    }

    public function getClosing($id)
    {
        $fixed_diposit = FixedDiposit::find($id);
        $get_all_profit = DB::table('fixed_diposit_profits')->select('profit')->where('fdr_id', '=', $fixed_diposit->id)->sum('profit');
        $get_all_withdraw = DB::table('fixed_diposit_profits')->select('withdraw')->where('fdr_id', '=', $fixed_diposit->id)->sum('withdraw');
        $payable_profit = $get_all_profit - $get_all_withdraw;
        return view('Accounts.Closing.fdr_closing', compact('fixed_diposit', 'payable_profit'));
    }

    public function getDPSClosing($id)
    {
        $dps = Savings::find($id);
        return view('Accounts.Closing.dps_closing', compact('dps'));
    }

    public function closingSearch(Request $request)
    {
        // return $request->all();
        $this->validate($request, ['account' => 'required', 'closing_type' => 'required']);

        $member = DB::table('members')->select(['id','account'])->where('account', $request->account)->first();
        if(!$member) {
            return redirect()->back()->with(Toastr::warning('No member found with the account number', 'Not Found!'));
        }
        // for loan closing purpose
        if ($request->closing_type == 1) {
            // find inactive fdr account number
            $loan = Loan::select('id')->whereIn('status', [1,2,3])->where('account_id', $member->account)->first();
            if (!$loan) {
                return redirect()->back()->with(Toastr::warning('This member has no running/open loan.', 'Not Found!'));
            }

            return redirect()->route('loan.closing.get', [$loan->id])->with(Toastr::info('Account Number Found!', 'Found'));
        // for fdr closing purpose
        }elseif ($request->closing_type == 2) {

            // find inactive fdr account number
            $fdr = FixedDiposit::select('id')->where('status', 1)->where('account', $member->account)->first();
            if (!$fdr) {
                return redirect()->back()->with(Toastr::warning('This member has no running/open FDR.', 'Not Found!'));
            }

            return redirect()->route('closing.get', [$fdr->id])->with(Toastr::info('Account Number Found!', 'Found'));
        }//this is for dps closing
        elseif ($request->closing_type == 3) {

            // find inactive savings account number
            $savings = Savings::select('id')->whereIn('status', [1,2])->where('account_id', $member->account)->first();
            if (!$savings) {
                return redirect()->back()->with(Toastr::warning('This member has no running/open savings.', 'Not Found!'));
            }

            return redirect()->route('dps.closing.get', [$savings->id])->with(Toastr::info('Account Number Found!', 'Found'));
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // this is for fdr closing
    public function store(Request $request)
    {
        $this->validate($request, [
            'start_date' => 'required',
            'passed_month' => 'nullable|numeric',
            'fdr_payable_amount' => 'nullable|numeric',
            'final_profit' => 'nullable|numeric',
            'note' => 'nullable|string',
            'fdr_account' => 'required',
        ]);
        $stored_closing = ClosingAccount::select('fdr_id')->where('fdr_id', $request->fdr_id)->count();
        if ($stored_closing) {
            return redirect()->back()->with(Toastr::warning('Already Closed!', 'Closed!'));
        }
        $closing = new ClosingAccount($request->except('fdr_id', 'note'));
        $closing->fdr_id = $request->fdr_id;
        $closing->note = $request->note;
        $closing->fdr_account = $request->fdr_account;
        $closing->save();

        $fdr_inactivate = FixedDiposit::find($request->fdr_id);
        $fdr_inactivate->status = 0;
        $fdr_inactivate->save();
        return redirect()->route('closing.index')->with(Toastr::success('FDR closed!', 'Success'));
    }


    // this is for loan closing view
    public function getLoanClosing($id)
    {
        $loan = Loan::find($id);
        return view('Accounts.Closing.loan_closing', compact('loan'));
    }

    // this is for loan closing
    public function storeLoanClosing(Request $request)
    {
        $this->validate($request, [
            'closing_date' => 'nullable|date',
            'penalty' => 'nullable|numeric',
            'discount' => 'nullable|numeric',
            'collect' => 'required',
            'note' => 'nullable|string',
        ]);

        $loan = Loan::select('status')->where('id', $request->loan_id)->first();
        if (in_array($loan->status, [1,2,3])) {

            $closing = new LoanClosing($request->except('closing_date','loan_id','account'));
            $closing->closing_date = date('Y-m-d');
            $closing->loan_id = $request->loan_id;
            $closing->account = $request->account;
            $closing->processed_by = Auth::user()->name;

            Loan::find($request->loan_id)->update(['status' => 0]);

            LoanInstallments::create([
                'loan_id' => $request->loan_id,
                'date' => $closing->closing_date,
                'installment_no'=>$loan->installments()->max('installment_no')+1,
                'amount' => $request->collect,
                'note' => 'Purpose: Loan closing',
                'processed_by' => Auth::user()->name,
            ])->save();

            $closing->save();


            return redirect()->route('closing.index')->with(Toastr::success('Account closed!', 'Success'));
        }

        return redirect()->route('closing.index')->with(Toastr::warning('Account already closed!', 'Warning!'));
    }

    public function storeSavingsClosing(Request $request)
    {
        $this->validate($request, [
            'date' => 'required|date',
            'savings_id' => 'required',
            'withdraw' => 'required',
            'note' => 'nullable|string',
        ]);

        $savings = Savings::find($request->savings_id);

        if (!$savings->status == 0) {
            $closing = new SavingsClosing($request->all());
            $closing->save();

            $savings->status = 0;
            $savings->withdraws()->create([
                'date' => $request->date,
                'withdraw' => $request->withdraw,
                'note' => 'Purpose: DPS Closing',
            ]);
            $savings->save();

            return redirect()->route('closing.index')->with(Toastr::success('Savings Account Closed Successfully!', 'Success'));
        }

        return redirect()->route('closing.index')->with(Toastr::warning('Savings Account Already Closed!', 'Warning'));
    }

}
