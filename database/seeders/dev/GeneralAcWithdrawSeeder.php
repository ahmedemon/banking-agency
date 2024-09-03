<?php

namespace Database\Seeders\Dev;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Accounts\GeneralAcTransactions;
use Carbon\Carbon;

class GeneralAcWithdrawSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $members = DB::table('members')->select(['account', 'join','regular_savings'])->get();

        // withdraw
        foreach ($members as $member) {
            $months =  Carbon::parse($member->join)->diffInMonths(now());
            for ($i=0; $i < $months-rand(1,$months); $i++) {
                $account = DB::select('select (ifnull(sum(deposit),0) - ifnull(sum(withdraw),0)) as balance from general_ac_transactions where account = ?',[$member->account]);
                $balance = $account[0]->balance;
                $amounts = [500,1000,2000,3000,5000,6000,10000];
                $withdraw = $amounts[array_rand($amounts)];

                if ($balance > $withdraw) {
                    $date = Factory::create()->dateTimeBetween(now() . '-'. $months .' month');
                    GeneralAcTransactions::insert([
                        'date'      => $date,
                        'account'   => $member->account,
                        'withdraw'  =>  $withdraw,
                        'created_at' => $date,
                        'updated_at' => $date,
                    ]);
                }

            }
        }
    }
}
