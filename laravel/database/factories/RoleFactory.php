<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Role;
use Faker\Generator as Faker;

$factory->define(Role::class, function (Faker $faker) {

    $randomInt = random_int(1, 2);

    if ($randomInt === 1) {
        $code = 'ADMIN';
        $name = '管理者';
    } elseif ($randomInt === 2) {
        $code = 'ORDINARY';
        $name = '一般ユーザー';
    }

    return [
        'code' => $code,
        'name' => $name,
    ];
});
