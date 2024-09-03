<?php
namespace App\Helpers;

use App\Models\Accounts\FixedDiposit;
use App\Models\Accounts\FixedDipositProfit;

// trait for generate profit
trait GenerateProfitTrait
{
    // use CheckStaffAccessByArea;

    // generate profit for fixed diposit
    public function genFdrProfit($fdrId)
    {
        $fdr = FixedDiposit::find($fdrId);

        $fdr_start = $fdr->starting_date;

        $profit_per_month = $fdr->amount * (($fdr->percent/100));

        $today = date('Y-m-d');

        if($fdr->scheme_id == 2){
            if($fdr_start.' +1 month' <= $today)
            {
                return $profit_per_month;
            }
        } else {

            $dateDiff = date_diff(date_create($fdr_start), date_create($today));
            $years = intval($dateDiff->days / 365);
            $months = $years * 12;

            if($fdr->months <= $months)
            {
                return $profit_per_month * $fdr->months;
            }
        }
    }

    // generate profit for fixed diposit
    public function makeFdrProfit($id)
    {
        $profits = null;
        $make_profit = 0;

        $fdr = FixedDiposit::find($id);

        // dd($fdr->scheme->type);


        if($fdr->scheme->type == 1) {
            if ($fdr->ending_date <= date('Y-m-d')) {
                $profits = FixedDipositProfit::where('fdr_id', $id)->where('year', date('Y'))->get()->count();
                $make_profit = ($fdr->amount * ($fdr->percent/100)) * ($fdr->months);
            }
        } else if($fdr->scheme->type == 2) {
            if ($fdr->ending_date <= date('Y-m-d')) {
                $profits = FixedDipositProfit::where('fdr_id', $id)->where('month', date('m'))->where('year', date('Y'))->get()->count();
                $make_profit = ($fdr->amount * ($fdr->percent/100));
            }
        } else {
            return 'invalid';
        }

        if ($profits > 0) {
            return 'exists';
        }

        return $make_profit;
    }
}
