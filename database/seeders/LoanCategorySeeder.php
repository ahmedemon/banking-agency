<?php

namespace Database\Seeders;

use App\Models\Primary\LoanCategory;
use Illuminate\Database\Seeder;

class LoanCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LoanCategory::insert([
            [
                'name' => 'General Loan',
                'interest_rate' => '10', // in percent
                'duration' => '120', //in days
                'max_amount' => '20000' // in taka
            ],
            [
                'name' => 'Small Business Loan',
                'interest_rate' => '12', // in percent
                'duration' => '365', //in days
                'max_amount' => '50000' // in taka
            ],
            [
                'name' => 'House Bulding Loan',
                'interest_rate' => '9', // in percent
                'duration' => '365', //in days
                'max_amount' => '50000' // in taka
            ],
            [
                'name' => 'Personal Loan',
                'interest_rate' => '15', // in percent
                'duration' => '104', //in days
                'max_amount' => '10000' // in taka
            ],
        ]);
    }
}
