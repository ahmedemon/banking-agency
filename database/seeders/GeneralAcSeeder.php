<?php

namespace Database\Seeders;

use App\Models\Accounts\GeneralAcTransactions;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory;
// use Faker\Generator as Faker;
// use Faker\Provider\DateTime;

class GeneralAcSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        GeneralAcTransactions::factory()->times(5000)->create();

        // withdraw
        $members = DB::table('members')->select(['account', 'join',])->get();

        foreach ($members as $member) {
            $amounts = [500,1000,2000];


            // for ($i=0; $i < 2; $i++):
                $data = [
                    'date' => Factory::create()->dateTimeBetween(now() . '-1 month'),
                    'account' => $member->account,
                    'withdraw' =>  $amounts[array_rand($amounts)],
                ];
                GeneralAcTransactions::insert($data);
            // endfor;
        }
    }
}
