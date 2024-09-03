<?php

namespace Database\Seeders;

use Database\Seeders\Dev\DevSeeder;
use Database\Seeders\Dev\DevUserSeeder;
use Database\Seeders\Dev\SchemeSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
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
            StaffRoleSeeder::class,
            UserSeeder::class,
            BrancheSeeder::class,

            // for testing
            VoucherCategorySeeder::class,

            SchemeSeeder::class,

            // DevSeeder::class,

            // DevUserSeeder::class

            // GeneralAcSeeder::class,
            // CurrentAcSeeder::class,

            // GeneralAcMassDataSeeder::class,
        ]);
    }
}
