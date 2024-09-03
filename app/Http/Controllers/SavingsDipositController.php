<?php

namespace App\Http\Controllers;

use App\Helpers\CheckStaffAccessByArea;
use App\Models\Accounts\Members;
use App\Models\Savings;
use Illuminate\Http\Request;
use App\Models\SavingsBalance;
use Brian2694\Toastr\Facades\Toastr;
use Brian2694\Toastr\Toastr as ToastrToastr;
use Illuminate\Support\Facades\Auth;

class SavingsDipositController extends Controller
{
    use CheckStaffAccessByArea;

    public function index($account)
    {
        $this->checkMemberAccessView($account);

        $member = Members::where('account', $account)->with('savings')->first();

        return view('savings.deposit.index', compact('member'));
    }

    public function search()
    {
        return view('savings.deposit.search');
    }

    public function postSearch(Request $request)
    {
        $request->validate(['account' => 'required']);

        $this->checkMemberAccess($request->account);

        $member = Members::where('account', $request->account)->first();

        if(!$member){
            return redirect()->back()->with(Toastr::error("Account did not found"));
        }

        if(!$member->savings()->count()){
            return redirect()->back()->with(Toastr::error("This account does not have a DPS ac"));
        }

        return redirect()->route('savings.deposit.index', $request->account);
    }

    public function create($id){
        $savings = Savings::find($id);

        $this->checkMemberAccessView($savings->member->account);

        return view('savings.deposit.create', compact('savings'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'savings_id' => 'required',
            'date'     => 'required|date',
            'deposit'  => 'required|numeric',
            'penalty'  => 'nullable',
        ]);

        $this->checkMemberAccessView(Savings::find($request->savings_id)->member->account);

        $deposit = new SavingsBalance($request->all());

        $deposit->code = uniqid();
        $deposit->processed_by = Auth::user()->name;

        $deposit->savings()->update(['status' => 2]);

        $deposit->save();

        $goToUrl = $request->session()->get('goto_url', route('savings.transactions', $request->savings_id));
        $request->session()->forget('goto_url');

        return redirect()->to($goToUrl)->with(Toastr::success('Saving installment deposit successfull!', 'Success'));
    }
}
