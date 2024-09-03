<?php

namespace Database\Seeders;

use App\Models\Primary\StaffRole;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class StaffRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = new StaffRole([ 'id' => 1, 'name' => Str::slug('Admin') ,'role_designation' => 'Admin', 'guard_name'=> 'web']);
        $role->save();

        $role = new StaffRole([ 'id' => 2, 'name' => Str::slug('Manager') ,'role_designation' => 'Manager', 'guard_name'=> 'web']);
        $role->save();

        $role = new StaffRole([ 'id' => 3, 'name' => Str::slug('Field Officer') ,'role_designation' => 'Field Officer', 'guard_name'=> 'web']);
        $role->save();

        $role = new StaffRole([ 'id' => 4, 'name' => Str::slug('Accountant') ,'role_designation' => 'Accountant', 'guard_name'=> 'web']);
        $role->save();

        $role = new StaffRole([ 'id' => 5, 'name' => Str::slug('Other') ,'role_designation' => 'Other', 'guard_name'=> 'web']);
        $role->save();

    }
}
