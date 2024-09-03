<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Savings;
use Illuminate\Http\Request;
use App\Models\SavingsBalance;
use App\Models\Accounts\Members;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use App\Helpers\CheckStaffAccessByArea;

class SavingsWithdrawController extends Controller
{
    use CheckStaffAccessByArea;

    public function index($account)
    {
        $member = Members::where('account', $account)->with('savings')->first();

        $this->checkMemberAccessView($member->account);

        return view('savings.withdraw.index', compact('member'));
    }

    public function search()
    {
        return view('savings.withdraw.search');
    }

    public function postSearch(Request $request)
    {
        $request->validate(['account' => 'required']);

        $this->checkMemberAccess($request->account);

        $member = Members::where('account', $request->account)->first();

        if(!$member){
            return redirect()->back()->with(Toastr::error("Account did not found"));
        }

        // return $member->savings()->count();

        if(!$member->savings()->count()){
            return redirect()->back()->with(Toastr::error("This account does not have a DPS ac"));
        }


        return redirect()->route('savings.withdraw.index', $request->account);
    }

    public function create($account,$id){
        $savings = Savings::find($id);

        $this->checkMemberAccessView($savings->account_id);

        // $savings = Savings::where('id', $request->savings_id)->first();
        // $toDate = Carbon::createMidnightDate($savings->start_date);
        // $fromDate = Carbon::createMidnightDate(now());
        // $days = $fromDate->diffInDays($toDate);

        return view('savings.withdraw.create', compact('savings', 'days'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'savings_id' => 'required',
            'withdraw'  => 'required|numeric',
        ]);

        $this->checkMemberAccess(Savings::find($request->savings_id)->account_id);

        $withdraw = new SavingsBalance($request->all());
        $withdraw->code = substr(md5(now().$request->savings_id),8,16);

        $withdraw->savings()->update(['status' => 2]);
        $withdraw->processed_by = Auth::user()->name;
        $withdraw->save();
        return redirect()->route('savings.transactions', $request->savings_id)->with(Toastr::success('Savings withdraw successfull!', 'Success'));
    }
}
