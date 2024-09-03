<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Primary\Area;

class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Area::create(
            [
                'id' => 1,
                'name' => 'Khalishpur Area',
                'branch_id' => 1,
                'associate_id' => 1,
            ]
        );

        Area::factory()->times(10)->create();
    }
}
