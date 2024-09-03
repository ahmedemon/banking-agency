<?php

namespace Database\Seeders\Dev;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Accounts\GeneralAcTransactions;

class GeneralAcDepositSeeder extends Seeder
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
            $randDays = '2015-01-01' . ' +' . rand(0, 5) . ' year' . ' +' . rand(0, 12) . ' month' . ' +' . rand(0, 30) . ' day';
            $date = date('Y-m-d', strtotime($randDays));

            while ($date <= date('Y-m-d')) {
                GeneralAcTransactions::insert([
                    'date' => $date,
                    'account' => $member->account,
                    'deposit' => $member->regular_savings,
                    'created_at' => $date,
                    'updated_at' => $date,
                ]);

                $date = date('Y-m-d', strtotime($date . ' +1 day'));
            }
        }
    }
}
