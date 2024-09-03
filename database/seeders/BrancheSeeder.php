<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Primary\BranchList;

class BrancheSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BranchList::create([
            'id' => 1,
            'name' => 'Main Branch',
            'address' => 'Khulna',
            'hotline' => '0132567890'
        ])->save();


        // BranchList::factory(10)->create();

        // BranchList::insert([
        //     [
        //         'id' => 1,
        //         'name' => 'Main Branch',
        //         'address' => 'Khulna',
        //         'hotline' => '0132567890'
        //     ],
        //     [
        //         'id' => 2,
        //         'name' => 'Khulna Branch',
        //         'address' => 'Khulna',
        //         'hotline' => '0132567890'
        //     ]
        // ]);

        //BranchList::factory()->times(7)->create();
    }
}
