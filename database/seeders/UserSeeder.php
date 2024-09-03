<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            'name' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            // 'role_id' => '1',
            'email_verified_at' => now(),
            'password' => bcrypt('admin1234'), // password
            'remember_token' => Str::random(10),
        ]);

        $role = Role::findByName('admin');

        $user = User::find(1);
        $user->assignRole($role);
    }
}
