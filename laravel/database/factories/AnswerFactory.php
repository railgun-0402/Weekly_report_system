<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Answer;
use Faker\Generator as Faker;

$factory->define(Answer::class, function (Faker $faker) {
    // return [
    //     'question_id' => $faker->randomNumber(2),
    //     'user_code' => $faker->randomNumber(2),
    //     'content' => str_replace(['。', '、'], '', $faker->realText(10)) . 'です',

    // ];
});
