<?php

namespace Database\Seeders;

use App\Models\Primary\VoucherCategory;
use Illuminate\Database\Seeder;

class VoucherCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        VoucherCategory::insert([
            ['name' => 'Office Expense', 'type' => 0, 'active' => 1, 'created_at' => now(), 'updated_at' => now(),],
            ['name' => 'Office Rent', 'type' => 0, 'active' => 1, 'created_at' => now(), 'updated_at' => now(),],
            ['name' => 'Motor Bike Fuel', 'type' => 0, 'active' => 1, 'created_at' => now(), 'updated_at' => now(),],
            ['name' => 'Medical Expense', 'type' => 0, 'active' => 1, 'created_at' => now(), 'updated_at' => now(),],
            ['name' => 'Internet Bill', 'type' => 0, 'active' => 1, 'created_at' => now(), 'updated_at' => now(),],
            ['name' => 'Electricity Bill', 'type' => 0, 'active' => 1, 'created_at' => now(), 'updated_at' => now(),],
            ['name' => 'Case Expense', 'type' => 0, 'active' => 1, 'created_at' => now(), 'updated_at' => now(),],
            ['name' => 'Depreciation', 'type' => 0, 'active' => 1, 'created_at' => now(), 'updated_at' => now(),],

            ['name' => 'Admission Fee', 'type' => 1, 'active' => 1, 'created_at' => now(), 'updated_at' => now(),],
            ['name' => 'Form Fee', 'type' => 1, 'active' => 1, 'created_at' => now(), 'updated_at' => now(),],
            ['name' => 'Received as Fine/Penalty', 'type' => 1, 'active' => 1, 'created_at' => now(), 'updated_at' => now(),],
            ['name' => 'Profit from loans/investment', 'type' => 1, 'active' => 1, 'created_at' => now(), 'updated_at' => now(),],
        ]);
    }
}
