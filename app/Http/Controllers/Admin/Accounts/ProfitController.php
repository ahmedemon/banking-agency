<?php

namespace App\Http\Controllers\Admin\Accounts;

use App\Http\Controllers\Controller;
use App\Models\Accounts\FixedDiposit;
use App\Models\Accounts\FixedDipositProfit;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class ProfitController extends Controller
{
    public function getProfit($id)
    {
        $profits = null;
        $fdr = FixedDiposit::find($id);

        if ($fdr->scheme->type == 1) {
            $profits = FixedDipositProfit::where('fdr_id', $id)->where('year', date('Y'))->get()->count();
            $make_profit = $fdr->amount * ($fdr->percent/100);
        } elseif ($fdr->scheme->type == 2){
            $make_profit = ($fdr->amount * ($fdr->percent/100))/12;
            $profits = FixedDipositProfit::where('fdr_id', $id)->where('month', date('m'))->where('year', date('Y'))->get()->count();
        }

        if ($profits > 0) {
            return redirect()->back()->with(Toastr::error('This month\'s profit already generated'));
        }

        $post = new FixedDipositProfit();
        $post->fdr_id = $fdr->id;
        $profit = $post->profit = $make_profit;
        return $profit;
        $post->month = date('m');
        $post->year = date('Y');

        $post->save();
        return redirect()->back()->with(Toastr::success('Profit generate successfully!', 'Profit Generated'));
    }
}
