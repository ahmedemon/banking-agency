<?php

namespace App\Http\Controllers\Admin\Reports;

use App\Http\Controllers\Controller;
use App\Models\Accounts\Members;
use App\Models\Primary\Area;
use App\Models\Primary\BranchList;
use App\Models\Primary\Staffs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{

    public function index()
    {
        $staffs = null;

        if (Auth::user()->hasRole('admin|manager')) {
            $areas = Area::select(['id','name','branch_id','associate_id'])->get();
            $branches = BranchList::select(['id','name'])->get();
            $staffs = DB::table('staffs')->select('id','name')->get();
        } else {
            $user = Auth::user();
            $areas = Area::select(['id','name','branch_id','associate_id'])->where('associate_id',$user->staff->id)->get();
            $branches = $user->staff->branch_op()->select(['id','name'])->get();
            $staffs = $user->staff()->select('id','name')->get();

        }

        return view('reports.daily.index', compact(['areas','branches','staffs']));
    }


    public function report(Request $request)
    {

        if (!Auth::user()->hasRole('admin|manager')) {
            $area_id = Auth::user()->staff->area->id;
            $branch_id = Auth::user()->staff->branch;

            if ($branch_id != $request->branch) {
                return redirect()->back()->with(toastr()->error('You are not allowed to view this branch'));
            }

            if ($area_id != $request->area) {
                return redirect()->back()->with(toastr()->error('You are not authorized to view this area'));
            }
        }

        $date = date('Y-m-d');
        if ($request->date) {
            $date = date('Y-m-d', strtotime($request->date));
        }
        $request->date = $date;

        $data=[];

        $branch = $request->branch != 'all' ? BranchList::find($request->branch) : null;
        if ($request->branch != 'all') {
            $data['branch'] = $branch->name;
        }

        $area = $request->area != 'all' ? Area::find($request->area) : null;
        if ($request->area != 'all') {
            $data['area'] = $area->name;
        }


        $conditions = "";

        if ($area || $branch) {
            $conditions .= "where ";
            $conditions .= $area ? "area_id = $area->id" : '';
        }

        $query = "SELECT
            m.account, m.m_name name,

            (select id from savings where account_id = m.account and status in (1,2) and deleted_at is null limit 1) r_dps_id,
            (select id from loans where account_id = m.account and status in (1,2) and deleted_at is null limit 1) c_loan_id,


            ifnull((select sum(deposit) from general_ac_transactions where account = m.account and `date` <= ? and deleted_at is null),0) gen_ac_amt,
            ifnull((select sum(deposit) from general_ac_transactions where account = m.account and `date` = ? and deleted_at is null),0) gen_deposit,
            ifnull((select sum(withdraw) from general_ac_transactions where account = m.account and `date` = ? and deleted_at is null),0) gen_withdraw,
            ifnull((select ifnull(sum(deposit),0)-ifnull(sum(withdraw),0) from general_ac_transactions  where account = m.account and `date` <= ? and deleted_at is null),0) gen_balance,

            ifnull((select loan_amount from loans  where id = c_loan_id and deleted_at is null),0) loan_dist_amt,
            ifnull((select convert((loan_amount+(loan_amount*(percent/100))), decimal) from loans  where id = c_loan_id and deleted_at is null),0) loan_total_amt,
            convert(ifnull((select ifnull(sum(amount),0) from loan_installments  where loan_id = c_loan_id and deleted_at is null),0), decimal) loan_paid_amt,
            ifnull((select installment_no from loan_installments  where loan_id = c_loan_id and `date` = ? and deleted_at is null),0) loan_install_no,
            ifnull((select amount from loan_installments  where loan_id = c_loan_id and `date` = ? and deleted_at is null),0) loan_install_amt,

            ifnull((select sum(deposit) from savings_balances where savings_id = r_dps_id and `date` <= ? and deleted_at is null),0) dps_amt,
            ifnull((select sum(deposit) from savings_balances where savings_id = r_dps_id and `date` = ? and deleted_at is null),0) dps_deposit,
            ifnull((select sum(withdraw) from savings_balances where savings_id = r_dps_id and `date` = ? and deleted_at is null),0) dps_withdraw,
            ifnull((select ifnull(sum(deposit),0)-ifnull(sum(withdraw),0) from savings_balances where savings_id = r_dps_id and `date` <= ? and deleted_at is null),0) dps_balance

            from members m " . $conditions . " order by id asc";

            $collDate=[];
            $i=0;
            while(++$i<=10) array_push($collDate, $date);

        $reports = DB::select($query, [...$collDate]);


        return view("reports.daily.show", compact('reports','data'));
    }

}
