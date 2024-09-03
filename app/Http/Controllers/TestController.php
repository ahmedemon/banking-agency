<?php

namespace App\Http\Controllers;

use App\Helpers\GenerateProfitTrait;
use App\Models\Accounts\FixedDiposit;
use App\Models\Accounts\FixedDipositProfit;
use App\Models\Accounts\GeneralAcTransactions;
use App\Models\Accounts\Members;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    use GenerateProfitTrait;

    public function index()
    {
        // $get_fdr_date = DB::table('fixed_diposits')->select('id', 'account', 'starting_date')->get();
        // $get_profit_date = DB::table('fixed_diposit_profits')->select('id', 'fdr_id', 'date')->get();
        // $today = now();

        $allFdr = FixedDiposit::where('status', 1)->select(['id', 'account', 'starting_date', 'scheme_id', 'amount', 'percent'])->get();

        foreach ($allFdr as $fdr) {
            $start_date = date('Ymd', strtotime($fdr->starting_date));
            $today = date('Ymd');
            $differance = $today - $start_date;

            // $fdr_duration = $fdr->scheme->duration * 30; // fdr duration in days

            // if ($fdr->scheme->type == 1) {
            //     $profit_count = FixedDipositProfit::where('fdr_id', $id)->where('year', date('Y'))->get()->count();
            //     $profit_amount = $fdr->amount * ($fdr->percent/100);
            // } else

            $first_profit_date = FixedDipositProfit::where('profit', null)->select(['created_at'])->get();
            return Carbon::today()->toDateString($first_profit_date);


            if ($differance >= 30) {

                if ($fdr->scheme->type == 2) {
                    $profit_count = FixedDipositProfit::where('fdr_id', $fdr->id)->where('month', date('m'))->where('year', date('Y'))->get()->count();
                    $profit_amount = ($fdr->amount * ($fdr->percent / 100)) / 12;
                }

                if ($profit_count == 0) {

                    // echo "<pre>";

                    // echo "Account:" . $fdr->account . PHP_EOL;
                    // echo "FDR ID:" . $fdr->id . PHP_EOL;
                    // echo "Start Date:" . $fdr->starting_date . PHP_EOL;
                    // echo "Scheme:" . $fdr->scheme_id . PHP_EOL;
                    // echo "Amount:" . $fdr->amount . PHP_EOL;
                    // echo "Percent:" . $fdr->percent . PHP_EOL;

                    // echo "Profit:" . $profit_amount . PHP_EOL;

                    // echo "</pre> <br>" ;

                    $post = new FixedDipositProfit();
                    $post->fdr_id = $fdr->id;
                    $post->profit = $profit_amount;
                    $post->withdraw = 0;
                    $post->date = now();
                    $post->month = date('m');
                    $post->year = date('Y');

                    $post->save();
                }
            }
        }


        // return $get_fdr_date = FixedDiposit::where('account')->get();
    }

    protected $model = Members::class;
    public function create()
    {
        // $member = $this->model::max('account');
        // $account = (int) ($member ? $member + 1 : 2021101);

        return DB::table('members')->select('account')->get()->random()->account;


        // $t0 = microtime(true);
        // for ($i = 0; $i < 100000; $i++) {
        // }
        // $tt1 = microtime(true) - $t0;

        // $t0 = microtime(true);
        // foreach (range(0, 100000) as $i) {
        // }
        // $tt2 = microtime(true) - $t0;

        // echo "<br>";
        // $t0 = microtime(true);
        // $i = 0;
        // while($i < 100000){
        //     $i++;
        // }
        // $tt3 = microtime(true) - $t0;

        // echo 'for loop: ' . $tt1 . ' s', "<br>";
        // echo 'foreach loop: ' . $tt2 . ' s', "<br>";
        // echo 'while loop: ' . $tt3 . ' s', "<br>";


        // echo "Time differance : " . ($tt1 - $tt2);
    }

    public function show()
    {
        $t0 = microtime(true);

        $date = date('Y-m-d');

        $query = "SELECT
            m.account, m.m_name name,

            (select id from savings where account_id = m.account and status in (1,2) limit 1) r_dps_id,
            (select id from loans where account_id = m.account and status in (1,2) limit 1) c_loan_id,


            ifnull((SELECT sum(deposit) from general_ac_transactions  where account = m.account),0) gen_ac_amt,
            ifnull((select sum(deposit) from general_ac_transactions where account = m.account and `date` = '$date'),0) gen_deposit,
            ifnull((select sum(withdraw) from general_ac_transactions where account = m.account and `date` = '$date'),0) gen_withdraw,
            ifnull((SELECT ifnull(sum(deposit),0)-ifnull(sum(withdraw),0) from general_ac_transactions  where account = m.account),0) gen_balance,


            ifnull((SELECT loan_amount from loans  where id = c_loan_id),0) loan_dist_amt,
            ifnull((SELECT convert((loan_amount+(loan_amount*(percent/100))), decimal) from loans  where id = c_loan_id),0) loan_total_amt,
            convert(ifnull((SELECT ifnull(sum(amount),0) from loan_installments  where loan_id = c_loan_id),0), decimal) loan_paid_amt,
            ifnull((SELECT installment_no from loan_installments  where loan_id = c_loan_id and `date` = '$date'),0) loan_install_no,
            ifnull((SELECT amount from loan_installments  where loan_id = c_loan_id and `date` = '$date'),0) loan_install_amt,



            ifnull((SELECT sum(deposit) from savings_balances where savings_id = r_dps_id),0) dps_amt,
            ifnull((SELECT sum(deposit) from savings_balances where savings_id = r_dps_id and `date` = '$date'),0) dps_deposit,
            ifnull((SELECT sum(withdraw) from savings_balances where savings_id = r_dps_id and `date` = '$date'),0) dps_withdraw,
            ifnull((SELECT ifnull(sum(deposit),0)-ifnull(sum(withdraw),0) from savings_balances where savings_id = r_dps_id),0) dps_balance

            FROM members m";


        $rep = DB::select($query);

        $tt = (microtime(true)-$t0) . " s";
        // $tt = (microtime(true)-$t0)*1000 . " ms";

        return [
            'time' => $tt,
            'data' => $rep,
        ];
    }

    public function profit()
    {
            $date = "2020-9-02";
            // $today = date('Y-m-d');
            $today = '2021-10-02';

            echo $differance = strtotime($today) - strtotime($date);
            echo date_create($date)->diff(date_create($today))->days;

            $dateDiff = date_diff(date_create($date), date_create($today));
            echo "<br>";
            $years = intval($dateDiff->days / 365);
            $months = $years * 12;

            // echo $dateDiff->format("%R%a days") . "<br>";
            // echo $dateDiff->format('%a') . '<br>';
            // echo $dateDiff->format('%m months') . '<br>';

            echo $years . ' year(s) <br>';
            echo $months . ' month(s) <br>';

            var_dump($dateDiff);

            $date1 = '2020-01-25';
            $date2 = '2021-02-20';

            $ts1 = strtotime($date1);
            $ts2 = strtotime($date2);

            $year1 = date('Y', $ts1);
            $year2 = date('Y', $ts2);

            $month1 = date('m', $ts1);
            $month2 = date('m', $ts2);

            echo $diff = (($year2 - $year1) * 12) + ($month2 - $month1);



            // FixedDiposit::all()->each(function ($item) {
            //     $item->update([
            //         'month' => date('m'),
            //         'year' => date('Y'),
            //     ]);
            // });

            echo "<br>";
            FixedDiposit::all()->each(function ($item) {
                echo $item->account .' : ' . $this->genFdrProfit($item->id) . "<br>";
            });
    }

    public function date()
    {

        // echo "<pre>";
        // $members = DB::table('members')->select(['account', 'join','regular_savings'])->get();

        // // $st0 = microtime(true);
        // // deposti seeding
        // // $members->each(function ($member){
        // // $i = 1;

        // foreach ($members as $member) {

        //     // $randDays = rand(30, 365);
        //     // $date = date('Y-m-d') . "-$randDays day";
        //     $date = date('Y-m-d', strtotime('2010-01-01'));
        //     // $date = $member->join;
        //     // $member = DB::table('members')->select(['account','join','regular_savings'])->get()->random();


        //     $key = 1;
        //     echo $member->account . "\n";
        //     while ($date <= date('Y-m-d'))
        //     {
        //         // echo $i++.'. ';
        //         echo $date . ($key%10==0 ? "\n" : "\t");

        //         // GeneralAcTransactions::insert( [
        //         //     'date' => $date,
        //         //     'account' => $member->account,
        //         //     'deposit' => $member->regular_savings,
        //         // ]);

        //         $date = date('Y-m-d', strtotime($date . ' +1 day'));
        //         $key++;
        //     }
        //     echo "\n";


        // // });
        // }

        // echo "<pre>";
        // echo microtime(true)-$st0;

        foreach (range(0,30 ) as $key) {
            $randDays = '2010-01-01'.' +'.rand(0,8).' year';
            $randDays .= ' +'.rand(0,12).' month';
            $randDays .= ' +'.rand(0,30).' day';
            echo $date = date('Y-m-d', strtotime($randDays));
            echo "<br>";
        }
    }

    public function dps()
    {
        Members::where('account', 2021101)->each(function ($member) {
            // echo $member->dps_trans->sum('deposit');
            echo $member->current_dps_balance;
            echo Carbon::parse($member->join)->diffInMonths(now());
        });

        $account = DB::select('select (ifnull(sum(deposit),0) - ifnull(sum(withdraw),0)) as balance from general_ac_transactions where account = ?',[2021101]);
        return $account[0]->balance;

    }

}
