<?php

namespace Database\Seeders\Dev;


use Database\Seeders\FDRSchemeSeeder;
use Database\Seeders\LoanCategorySeeder;
use Database\Seeders\SavingsSchemeSeeder;
use Illuminate\Database\Seeder;

class SchemeSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            SavingsSchemeSeeder::class,
            FDRSchemeSeeder::class,
            LoanCategorySeeder::class,
            // GeneralAcSeeder::class,
        ]);
    }
}
