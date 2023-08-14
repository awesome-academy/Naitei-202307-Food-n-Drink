<?php

namespace Database\Seeders;

use App\Enums\UserRole;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 5; ++$i) {
            User::create([
                'username' => 'user' . $i . '-account',
                'first_name' => 'user' . $i,
                'last_name' => 'account',
                'email' => 'user' . $i . '.account@sun-asterisk.com',
                'password' => bcrypt('12345678'),
                'is_active' => true,
                'role' => UserRole::ROLE_USER,
                'email_verified_at' => now(),
                'remember_token' => Str::random(10),
            ]);
        }

        for ($i = 0; $i < 5; ++$i) {
            User::create([
                'username' => 'salesman' . $i . '-account',
                'first_name' => 'salesman' . $i,
                'last_name' => 'account',
                'email' => 'salesman' . $i . '.account@sun-asterisk.com',
                'password' => bcrypt('12345678'),
                'is_active' => true,
                'role' => UserRole::ROLE_SALESMAN,
                'email_verified_at' => now(),
                'remember_token' => Str::random(10),
            ]);
        }
    }
}
