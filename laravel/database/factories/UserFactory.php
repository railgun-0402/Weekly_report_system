<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {

    // $search = '.';
    // $replacement = '';
    // $pattern = '/[0-9]/';
    // $subject = str_replace($search, $replacement, $faker->userName);
    // $name = preg_replace($pattern, $replacement, $subject);

    // $roleCode = random_int(1, 2) === 1 ? 'ADMIN' : 'ORDINARY';

    // return [
    //     // 'name' => $faker->name,
    //     'email' => $faker->unique()->safeEmail,
    //     'email_verified_at' => now(),
    //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
    //     'remember_token' => Str::random(10),

    //     // 以下追加
    //     'name' => $name,
    //     'code' => $faker->unique()->randomNumber(2),
    //     'role_code' => $roleCode,
    //     'full_name' => $faker->name,
    //     'code' => $faker->dayOfMonth,

    ];
});
