<?php

namespace Database\Seeders;

use App\Models\SavingsScheme;
use Illuminate\Database\Seeder;

class SavingsSchemeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SavingsScheme::create(
            [
                'name'      => '100Tk per day',
                'distance'  => '1',
                'status'    => '1',
            ],
        );
        SavingsScheme::create(
            [
                'name'      => '500Tk per week',
                'distance'  => '7',
                'status'    => '1',
            ],
        );
        SavingsScheme::create(
            [
                'name'      => '1000Tk per month',
                'distance'  => '30',
                'status'    => '1',
            ],
        );
        SavingsScheme::create(
            [
                'name'      => '5000Tk per year',
                'distance'  => '365',
                'status'    => '1',
            ]
        );
    }
}
