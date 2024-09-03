<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Accounts\FixedDiposit;
use App\Models\Accounts\FixedDipositProfit;
use App\Models\Accounts\GeneralAcTransactions;
use App\Models\Accounts\Loan;
use App\Models\Accounts\Members;
use App\Models\LoanInstallments;
use App\Models\Primary\Area;
use App\Models\Primary\BranchList;
use App\Models\Primary\DirectorList;
use App\Models\Primary\Outloan;
use App\Models\Primary\Staffs;
use App\Models\Savings;
use App\Models\SavingsBalance;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $report = [];

        if (auth()->user()->hasRole('field-officer')) {
            // $branch_id = auth()->user()->staff->branch;
            $area_id = auth()->user()->staff->area->id;
            $area = Area::find($area_id);

            $report['loan_count']               = $area->loans->count();
            $report['investment']               = $area->loans->sum('loan_amount');
            $report['total_male_member']        = $area->members()->where('m_gender', 1)->count();
            $report['total_female_member']      = $area->members()->where('m_gender', 2)->count();
            $report['monthly_savings']          = $area->savings->sum('deposit');
            $report['general_savings']          = $area->general_ac->sum('deposit') -  $area->general_ac->sum('withdraw') ;
            $report['current_ac']               = $area->current_ac->sum('deposit_amount') -  $area->current_ac->sum('withdraw') ;

            $report['investment_return']        = '45';//$area->loans()->sum('loan_amount');

            $report['total_member']             = $area->members->count();

            $report['fdr_deposit']              = $area->fdr->sum('amount');
            $report['fdr_profit_served']        = FixedDipositProfit::sum('withdraw');
            $report['total_inactive_member']    = $area->members()->where('active', 0)->orWhere('active', null)->count();

        }



        if(auth()->user()->hasRole('admin|manager|accountant')){
            $report['investment']               = Loan::sum('loan_amount');
            $report['total_area']               = Area::count();
            $report['total_member']             = Members::count();
            $report['general_savings']          = GeneralAcTransactions::sum('deposit') - GeneralAcTransactions::sum('withdraw') ;
            $report['monthly_savings']          = SavingsBalance::sum('deposit');
            $report['investment_return']        = LoanInstallments::sum('amount');
            $report['fdr_deposit']              = FixedDiposit::sum('amount');
            $report['fdr_profit_served']        = FixedDipositProfit::sum('withdraw');
            $report['total_branch']             = BranchList::count();
            $report['total_staff']              = Staffs::count();
            $report['total_savings_ac']         = Members::count();
            $report['total_monthly_savings_ac'] = Savings::count();
            $report['total_director']           = DirectorList::count();
            $report['total_male_member']        = Members::where('m_gender', 1)->count();
            $report['total_female_member']      = Members::where('m_gender', 2)->count();
            $report['total_inactive_member']    = Members::where('active', 0)->orWhere('active', null)->count();
            $report['total_outloan']            = Outloan::sum('balance');
        }


        return view('index', compact('report'));
    }
}
