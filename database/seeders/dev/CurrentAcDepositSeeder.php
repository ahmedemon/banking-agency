<?php

namespace Database\Seeders\Dev;

use App\Models\Accounts\CurrentAccount;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CurrentAcDepositSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $members = DB::table('members')->select(['account', 'join', 'regular_savings'])->get();

        // deposit seeding
        foreach ($members as $member) {
            $randDays = '2019-01-01' . ' +' . rand(0, 5) . ' year' . ' +' . rand(0, 12) . ' month' . ' +' . rand(0, 30) . ' day';
            $date = date('Y-m-d', strtotime($randDays));
            $amounts = [500,1000,2000,3000,5000,6000];

            while ($date <= date('Y-m-d')) {
                CurrentAccount::insert([
                    'date' => $date,
                    'account' => $member->account,
                    'deposit_amount' => $amounts[array_rand($amounts)],
                    'created_at' => $date,
                    'updated_at' => $date,
                ]);

                $date = date('Y-m-d', strtotime($date . ' +1 day'));
            }
        }
    }
}
