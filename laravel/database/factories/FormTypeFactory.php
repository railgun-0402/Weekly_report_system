<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\FormType;
use Faker\Generator as Faker;

$factory->define(FormType::class, function (Faker $faker) {

    $randomInt = random_int(1, 4);

    if ($randomInt === 1) {
        $formName = 'テキストボックス';
    } elseif ($randomInt === 2) {
        $formName = 'ラジオボタン';
    } elseif ($randomInt === 3) {
        $formName = 'チェックボックス';
    } elseif ($randomInt === 4) {
        $formName = 'ドロップダウンメニュー';
    }

    return [
        'code' => $randomInt,
        'name' => $formName,
    ];
});
