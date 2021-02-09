<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Question;
use Faker\Generator as Faker;

$factory->define(Question::class, function (Faker $faker) {

    static $a = 1;
    static $b = 1;
    static $c = 1;
    static $d = 1;
    static $e = 1;
    static $f = 1;

    // 質問内容を配列で管理する
    $contents = ["今週の業務内容はなんですか？",
                "業務には慣れましたか？",
                "上司の方とは上手くいっていますか？",
                "新しく身についたことはなんですか？",
                "気になっていることはありますか？",
                "やってみたい言語・内容はありますか？",
                "体調の悪いところがあれば記述してください"];

    return [
        'question_group' => $faker->numberBetween(1, 10),
        'form_types_code' => mt_rand(1, 4),
        'user_code' => $faker->unique()->randomNumber(2),
        'selectable_item' => mt_rand(1, 5),
        'item_content1' => 'とても良い-' . $a++,
        'item_content2' => '良い-' . $b++,
        'item_content3' => '普通-' . $c++,
        'item_content4' => 'やや悪い-' . $d++,
        'item_content5' => '悪い-' . $e++,
        //'content' => '慣れましたか？-' . $f++,
        'content' => $contents[array_rand($contents)] . $f++,

    ];
});
