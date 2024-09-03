<?php

namespace App\Http\Controllers\Admin\Debits;

use App\Helpers\CheckStaffAccessByArea;
use App\Http\Controllers\Controller;
use App\Models\Accounts\FixedDiposit;
use App\Models\Accounts\FixedDipositProfit;
use App\Models\Accounts\Members;
use App\Models\FixedDipositProfitWithdrawal;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FixedDepositProfitWithdrawController extends Controller
{
    use CheckStaffAccessByArea;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Debits.FixedDipositProfitWithdrawal.index');
    }
    public function getAccountNumber($id)
    {
        $member = Members::find($id);

        $this->checkMemberAccessView($member->account);

        return view('Debits.FixedDipositProfitWithdrawal.index', compact('member'));

    }

    public function postAccountNumber(Request $request)
    {
        // return $request->all();
        $this->validate($request, ['account' => 'required']);

        $this->checkMemberAccess($request->account);

        $member = DB::table('members')->select(['id'])->where('account', $request->account)->first();

        if (!$member) {
            return redirect()->back()->with(Toastr::error('Account number not found!', 'Not Found'));
        }
        return redirect()->route('fdr-withdraw.getAccNumber', $member->id)->with(Toastr::info('Account Number Found!', 'Found'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Debits.FixedDipositProfitWithdrawal.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fdr = FixedDiposit::find($request->fdr_id);

        $profit = $fdr->profit()->sum('profit');
        $withdraw = $fdr->withdraw()->sum('withdraw');

        $receiveable = $profit - $withdraw;

        $this->validate($request, [
            'date' => 'date',
            'month' => 'numeric|min:1',
            'year' => 'numeric',
            'get_profit' => 'numeric|max:' . $receiveable,
            'withdraw' => 'required',
            'note' => 'nullable',
        ]);

        $final_withdraw = new FixedDipositProfit($request->all());
        $final_withdraw->save();
        return redirect()->back()->with(Toastr::success('Withdrawal Completed Successfully!', 'Success'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $member = Members::find($id);
        $fdr = FixedDiposit::find($id);

        $this->checkMemberAccessView($fdr->account);

        $profit = $fdr->profit()->sum('profit');
        $withdraw = $fdr->withdraw()->sum('withdraw');

        $receiveable = $profit - $withdraw;
        return view('Debits.FixedDipositProfitWithdrawal.withdraw', compact('fdr', 'receiveable'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
