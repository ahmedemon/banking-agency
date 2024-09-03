<?php

namespace App\Http\Controllers\Admin\Accounts;

use App\Helpers\CheckStaffAccessByArea;
use App\Http\Controllers\Controller;
use App\Models\Accounts\CurrentAccount;
use App\Models\Accounts\Members;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CurrentAccountController extends Controller
{
    use CheckStaffAccessByArea;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth()->user()->hasRole('admin|manager')){
            $members = Members::with('currentAccount')->orderBy('area_id')->orderBy('account')->get();
        } else {
            $members = Members::where('area_id', Auth::user()->staff->area->id)->with('currentAccount')->orderBy('area_id')->orderBy('account')->get();
        }

        return view('Accounts.CurrentAccout.index', compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    public function getSearch()
    {
        return view('Accounts.CurrentAccout.search');
    }

    public function useAccount($account)
    {
        $this->checkMemberAccess($account);

        $member = Members::where('account',$account)->first();

        return view('Accounts.CurrentAccout.create', compact('member'));
    }

    public function getAccount(Request $request)
    {
        $this->validate($request, ['account' => 'required']);

        $this->checkMemberAccess($request->account);

        $member = DB::table('members')->select(['account'])->where('account', $request->account)->first();

        if (!$member) {
            return redirect()->back()->with(Toastr::warning('No account found', 'Warning!'));
        }

        return redirect()->route('current-account.use', [$member->account])->with(Toastr::info('Account Number Found!', 'Found'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'date' => 'required',
            'account' => 'required|numeric',
            'deposit_amount' => 'numeric',
            'withdraw' => 'nullable',
        ]);

        $this->checkMemberAccess($request->account);

        $new_ca = new CurrentAccount($request->all());
        $new_ca->save();

        // return $request->session()->all();
        $urlToGo = $request->session()->get('goto_url', route('current-account.index'));
        Session::forget('goto_url');

        return redirect()->to($urlToGo)->with(Toastr::success('Current Account is running from now!', 'Success'));
        // return redirect()->route('current-account.index')->with(Toastr::success('Current Account is running from now!', 'Success'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

    public function withdrawRoute($id)
    {
        $member = Members::where('account', $id)->first();

        $this->checkMemberAccessView($member->account);

        return view('Accounts.CurrentAccout.withdraw', compact('member'));
    }

    public function withdraw(Request $request, $account)
    {

        $this->checkMemberAccess($account);

        $deposit_amount = DB::table('current_accounts')->where('account', $account)->sum('deposit_amount');
        $withdraw_amount = DB::table('current_accounts')->where('account', $account)->sum('withdraw');
        $available_amount = $deposit_amount - $withdraw_amount;
        if ($available_amount < $request->withdraw) {
            return redirect()->back()->with(Toastr::warning('You have not enough balance to wihtdraw!', 'Warning'));
        }
        $withdraw = new CurrentAccount();
        $withdraw->date = now();
        $withdraw->account = $request->account;
        $withdraw->deposit_amount = null;
        $withdraw->withdraw = $request->withdraw;
        $withdraw->status = 0;
        $withdraw->save();

        return redirect()->route('current-account.index')->with(Toastr::info('Your withdrawal request successfully complete!', 'Info'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cd = CurrentAccount::find($id);

        $this->checkMemberAccess($cd->account);

        $cd->delete();
        return redirect()->back()->with(Toastr::success('Account deleted!', 'Deleted'));
    }
}
