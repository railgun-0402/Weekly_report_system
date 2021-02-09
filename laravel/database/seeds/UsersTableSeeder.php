<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->insert([
            [
                'code' => 1,
                'role_code' => 'ORDINARY',
                'name' => 'user',
                'remember_token' => Str::random(10),
                'email' => 'example@example.com',
                'email_verified_at' => now(),
                'full_name' => 'full_name',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'code' => 2,
                'role_code' => 'ADMIN',
                'name' => 'admin',
                'remember_token' => Str::random(10),
                'email' => 'examplee@example.com',
                'email_verified_at' => now(),
                'full_name' => 'full_name',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],

        ]);

        factory(\App\User::class, 48)->create();
    }
}
