<?php

namespace Database\Seeders;

// use App\Models\Accounts\GeneralAcTransactions;

use Database\Seeders\Dev\GeneralAcDepositSeeder;
use Database\Seeders\Dev\GeneralAcWithdrawSeeder;
use Illuminate\Database\Seeder;
// use Illuminate\Support\Facades\DB;
// use Faker\Factory;
// use Faker\Generator as Faker;
// use Faker\Provider\DateTime;

class GeneralAcMassDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // GeneralAcTransactions::factory()->times(15000)->create();

        $this->call(GeneralAcDepositSeeder::class);
        $this->call(GeneralAcWithdrawSeeder::class);
    }
}

// making factory in this project
