<?php

namespace Database\Seeders\Dev;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DevUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            [
                'name' => 'Arman Arif',
                'username' => 'armanarif',
                'email' => 'dev@armanarif.com',
                // 'role_id' => '1',
                'email_verified_at' => now(),
                'password' => bcrypt('password'), // password
                'remember_token' => Str::random(10),
            ],
            [
                'name' => 'Ahmed Emon',
                'username' => 'ahmedemon',
                'email' => 'ahmedemon@gmail.com',
                // 'role_id' => '1',
                'email_verified_at' => now(),
                'password' => bcrypt('ahmedemon'), // password
                'remember_token' => Str::random(10),
            ],
        ]);

        $role = Role::findByName('admin');

        $user = User::find(2);
        $user->assignRole($role);

        $user = User::find(3);
        $user->assignRole($role);
    }
}
