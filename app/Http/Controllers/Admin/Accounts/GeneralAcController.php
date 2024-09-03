<?php

namespace App\Http\Controllers\Admin\Accounts;

use Illuminate\Http\Request;
use App\Models\Accounts\Members;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use App\Helpers\CheckStaffAccessByArea;
use Illuminate\Support\Facades\Session;
use App\Models\Accounts\GeneralAcTransactions;

class GeneralAcController extends Controller
{
    use CheckStaffAccessByArea;

    //
    public function index()
    {
        $members = null;
        if(Auth::user()->hasRole('admin|manager')){
            $members = Members::orderBy('account')->with('generalAc')->paginate(10);
        }
        if (Auth::user()->hasRole('field-officer')) {
            $members = Members::where('area_id', auth()->user()->staff->area->id)->orderBy('account')->with('generalAc')->paginate(10);
        }
        return view('Accounts.general-ac.index', compact('members'));
    }

    public function getSearchDeposit()
    {
        return view('Accounts.general-ac.search-deposit');
    }

    public function postSearchDeposit(Request $request)
    {
        $this->validate($request, ['account' => 'required']);

        $this->checkMemberAccess($request->account);

        $member = Members::where('account', $request->account)->first();

        if(!$member){
            return redirect()->back()->with(Toastr::error('Account could not found'));
        }

        return redirect()->route('general-ac.deposit', $request->account);
    }

    public function getSearchWithdraw()
    {
        return view('Accounts.general-ac.search-withdraw');
    }

    public function postSearchWithdraw(Request $request)
    {
        $this->validate($request, ['account' => 'required']);

        $this->checkMemberAccess($request->account);

        $member = Members::where('account', $request->account)->first();

        if(!$member){
            return redirect()->back()->with(Toastr::error('Account could not found'));
        }

        return redirect()->route('general-ac.withdraw', $request->account);
    }

    public function getDeposit($account)
    {
        Session::flash('goto_url', url()->previous());
        $member = Members::where('account', $account)->first();

        $this->checkMemberAccessView($account);

        return view('Accounts.general-ac.deposit', compact('member'));
    }

    public function getWithdraw($account)
    {
        $member = Members::where('account', $account)->first();
        return view('Accounts.general-ac.withdraw', compact('member'));
    }

    public function postDeposit(Request $request, $account)
    {
        $this->validate($request, [
            'account'   => 'required',
            'date'      => 'required|date',
            'deposit'   => 'required|numeric',
            'note'      => 'nullable|string'
        ]);

        $this->checkMemberAccess($account);

        $generalAccount = new GeneralAcTransactions($request->all());
        $generalAccount->processed_by = Auth::user()->name;
        $generalAccount->save();

        return redirect(Session::get('goto_url'))->with(Toastr::success('Deposit posted successfully', 'Success!'));
    }

    public function postWithdraw(Request $request, $account)
    {
        $this->validate($request, [
            'account'   => 'required',
            'date'      => 'required|date',
            'withdraw'   => 'required|numeric',
            'note'      => 'nullable|string'
        ]);

        $this->checkMemberAccess($account);

        $generalAccount = new GeneralAcTransactions($request->all());
        $generalAccount->processed_by = Auth::user()->name;
        $generalAccount->save();

        return redirect()->route('general-ac.transactions', $account)->with(Toastr::success('Deposit posted successfully', 'Success!'));
    }


    public function transactions($account)
    {
        $this->checkMemberAccess($account);

        $member = Members::where('account', $account)->first();

        return view('Accounts.general-ac.transactions', compact('member'));
    }
}
