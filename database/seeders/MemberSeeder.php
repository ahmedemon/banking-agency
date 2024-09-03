<?php

namespace Database\Seeders;

use App\Models\Accounts\Members;
use Illuminate\Database\Seeder;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Members::factory()->times(15)->create();
        for ($i=0; $i < 50; $i++) {
            Members::factory()->create();
        }
    }
}
