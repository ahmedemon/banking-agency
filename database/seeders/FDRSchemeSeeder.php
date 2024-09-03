<?php

namespace Database\Seeders;

use App\Models\Primary\FixedDipositScheme;
use Illuminate\Database\Seeder;

class FDRSchemeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FixedDipositScheme::insert(
            [
                [
                    'name' => '100000Tk for 1 year',
                    'type' => 2,
                    'duration' => 12,
                    'profit' => rand(8, 10),
                    'note' => null,
                ],
                [
                    'name' => '200000Tk for 2 years',
                    'type' => 2,
                    'duration' => 24,
                    'profit' => rand(8, 10),
                    'note' => null,
                ],
                [
                    'name' => '300000Tk for 5 years',
                    'type' => 2,
                    'duration' => 60,
                    'profit' => rand(8, 10),
                    'note' => null,
                ],
                [
                    'name' => '100000Tk for 1 year',
                    'type' => 1,
                    'duration' => 12,
                    'profit' => rand(8, 10),
                    'note' => null,
                ],
            ]
        );
    }
}
