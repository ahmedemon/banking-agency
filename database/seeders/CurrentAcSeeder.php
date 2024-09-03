<?php

namespace Database\Seeders;

use App\Models\Accounts\CurrentAccount;
use Database\Seeders\Dev\CurrentAcDepositSeeder;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory;
// use Faker\Generator as Faker;
// use Faker\Provider\DateTime;

class CurrentAcSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CurrentAccount::factory()->times(500)->create();

        // $this->call(CurrentAcDepositSeeder::class);

        // withdraw
        $members = DB::table('members')->select(['account', 'join',])->get();

        foreach ($members as $member) {

            $account = DB::select('select (ifnull(sum(deposit_amount),0) - ifnull(sum(withdraw),0)) as balance from current_accounts where account = ?',[$member->account]);
            $balance = $account[0]->balance;
            // $amounts = [500,1000,2000,3000,5000];
            $amounts = [500,1000,2000,3000,5000,6000,10000,20000];
            $withdraw = $amounts[array_rand($amounts)];

            if ($balance > $withdraw) {
                for ($i=0; $i < 3; $i++) {
                    CurrentAccount::insert([
                        'date' => Factory::create()->dateTimeBetween(now() . '-1 month'),
                        'account' => $member->account,
                        'withdraw' =>  $withdraw,
                    ]);
                }
            }
        }
    }
}
