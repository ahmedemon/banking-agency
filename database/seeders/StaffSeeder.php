<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\User;
use Illuminate\Support\Str;
use App\Models\Primary\Staffs;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class StaffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $staff = Staffs::create([
            'join' => '2021-10-09',
            'name' => 'Officer',
            'birthday' => '1999-02-11',
            'gender' => 1,
            'mobile' => '01755444455',
            'address' => Factory::create()->address(),
            'designation'=> 'Field Officer',
            'publish' => 1,
            'user_role' => 3,
            'branch' => 1,
            'active' => 1,
        ]);

        $staff->save();

        $user = User::create([
            'name' => $staff->name,
            'username' => Str::slug($staff->name),
            'email' => strtolower($staff->name) . '@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password'), // password
            'remember_token' => Str::random(10),
        ]);

        $user->save();

        $staff->update(['user_id' => $user->id]);

        $role = Role::findByName('field-officer');

        $user->assignRole($role);


        // accountant
        $staff = Staffs::create([
            'join' => '2021-10-09',
            'name' => 'Accountant',
            'birthday' => '1999-02-11',
            'gender' => 1,
            'mobile' => '01711223344',
            'address' => Factory::create()->address(),
            'designation'=> 'Accountant',
            'publish' => 1,
            'user_role' => 4,
            'branch' => 1,
            'active' => 1,
        ]);

        $staff->save();

        $user = User::create([
            'name' => $staff->name,
            'username' => Str::slug($staff->name),
            'email' => strtolower($staff->name) . '@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password'), // password
            'remember_token' => Str::random(10),
        ]);

        $user->save();

        $staff->update(['user_id' => $user->id]);

        $role = Role::findByName('accountant');

        $user->assignRole($role);



        Staffs::factory()->times(20)->create();
    }
}
