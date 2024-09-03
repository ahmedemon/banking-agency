<?php

namespace Database\Seeders\Dev;

use Database\Seeders\AreaSeeder;
use Database\Seeders\MemberSeeder;
use Database\Seeders\StaffSeeder;
use Illuminate\Database\Seeder;

class DevSeeder extends Seeder
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
            StaffSeeder::class,
            AreaSeeder::class,
            MemberSeeder::class,
            // GeneralAcSeeder::class,
        ]);
    }
}
