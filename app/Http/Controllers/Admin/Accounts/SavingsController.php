<?php

namespace App\Http\Controllers\Admin\Accounts;

use App\Helpers\CheckStaffAccessByArea;
use App\Http\Controllers\Controller;
use App\Models\Accounts\Members;
use App\Models\Savings;
use App\Models\SavingsScheme;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
// use Ramsey\Uuid\Uuid;

class SavingsController extends Controller
{
    use CheckStaffAccessByArea;

    protected $rules = [
        'account_id'     => 'required',
        'scheme_id'      => 'required',
        'start_date'     => 'required|date',
        'savings_amount' => 'required|integer',
        'installment'    => 'required|integer',
        'expire_date'    => 'required|date',
    ];

    protected $messages = [
        'scheme_id.required'      => 'Scheme not found',
        'start_date.required'     => 'Savings start date is required',
        'start_date.date'         => 'Savings start date must be a date',
        'savings_amount.required' => 'Amount per installment date is required',
        'savings_amount.integer'  => 'Amount per installment must be a positive',
        'expire_date.required'    => 'Expire date is required',
        'expire_date.date'        => 'Expire date must be a date',
    ];


    public function index()
    {
        // Session::forget('goto_url');

        if(Auth()->user()->hasRole('admin|manager')){
            if (request()->has('account')) {
                $account = request()->query('account');
                $savings = Savings::where('account_id', $account)->with(['member', 'scheme'])->latest()->paginate();
            } else {
                $savings = Savings::with(['member', 'scheme'])->latest()->paginate(10);
            }
        } else {
            if (request()->has('account')) {
                $account = request()->query('account');
                $savings = Savings::where('account_id', $account)->whereHas('member', function($query){
                    $query->where('area_id', Auth()->user()->staff->area->id);
                })->with(['member', 'scheme'])->latest()->paginate();
            } else {
                $savings = Savings::whereHas('member', function($query){
                    $query->where('area_id', Auth()->user()->staff->area->id);
                })->with(['member', 'scheme'])->latest()->paginate(10);
            }
        }


        return view('savings.index', compact('savings'));
    }

    public function closed()
    {
        if (request()->has('account')) {
            $account = request()->query('account');

            $this->checkMemberAccessView($account);

            $savings = Savings::where('account_id', $account)->where('status','0')->with(['member', 'scheme'])->latest()->paginate();
        } else {
            $savings = Savings::where('status','0')->with(['member', 'scheme'])->latest()->paginate(10);
        }

        return view('savings.closed', compact('savings'));
    }

    public function getNew($id)
    {
        $member = Members::find($id);

        $this->checkMemberAccessView($member->account);

        $schemes = SavingsScheme::where('status', 1)->get();
        $num_savings = Savings::where('account_id', $member->account)->where('status', '1')->count();

        return view('savings.new', compact('member', 'schemes', 'num_savings'));
    }

    public function postNew(Request $request)
    {
        $this->validate($request, ['account' => 'required']);

        $this->checkMemberAccess($request->account);

        $member = DB::table('members')->select(['id', 'account'])->where('account', $request->account)->first();

        if (!$member) {
            return redirect()->back()->with(Toastr::error('Account not found!','Error!'));
        }

        $savings_check = DB::table('savings')->select('status')->where('account_id', $request->account)->whereIn('status',[1,2,3])->get()->first();
        if ($savings_check) {
            return redirect()->back()->with(Toastr::warning('This account is already has running/open dps', 'Warning'));
        }


        return redirect()->route('savings.add', $member->id);
    }

    public function create()
    {
        return view('savings.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, $this->rules, $this->messages);

        $this->checkMemberAccess($request->account_id);

        $savings = new Savings($request->except('expire_date', 'distance', 'interest'));
        $savings->code = Str::uuid();
        $savings->expire_date = date('Y-m-d', strtotime($request->expire_date));
        $savings->status = 1;

        $savings->save();

        // $goToUrl = $request->session()->get('goto_url', route('savings.index'));
        // $request->session()->forget('goto_url');

        return redirect()->to(route('savings.index'))->with(Toastr::success('New Savings added successfully!','Added'));
    }

    public function show($id)
    {
        $savings = Savings::find($id);

        $this->checkMemberAccessView($savings->account_id);

        return view('savings.transactions', compact('savings'));
    }

    public function edit($id)
    {
        $this->checkMemberAccess($id);
    }

    public function update(Request $request, $id)
    {
        $this->checkMemberAccess($id);
    }

    public function destroy($id)
    {
        $this->checkMemberAccess($id);

        $savings = Savings::find($id);
        $savings->delete();

        return redirect()->route('savings.index')->with(Toastr::info('Saving Ac deleted successfully!','Success'));
    }
}
