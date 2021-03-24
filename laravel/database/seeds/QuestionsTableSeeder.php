<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('questions')->insert([

            // 質問の集合体１
            [
                'question_group' => '20210101',
                'form_types_code' => '1',
                'user_code' => '100',
                'content' => '現在どのプロジェクトを担当していますか？',
                'selectable_item' => '0',
                'item_content1' => NULL,
                'item_content2' => NULL,
                'item_content3' => NULL,
                'item_content4' => NULL,
                'item_content5' => NULL,
                'created_at' => now(),
            ],
            [
                'question_group' => '20210101',
                'form_types_code' => '2',
                'user_code' => '100',
                'content' => 'プロジェクトの進捗はいかがですか？',
                'selectable_item' => '5',
                'item_content1' => '大変良好',
                'item_content2' => '良好',
                'item_content3' => '普通',
                'item_content4' => 'あまり進んでいない',
                'item_content5' => '全然進んでいない',
                'created_at' => now(),
            ],
            [
                'question_group' => '20210101',
                'form_types_code' => '1',
                'user_code' => '100',
                'content' => '何か伝えたいことはありますか？',
                'selectable_item' => '0',
                'item_content1' => NULL,
                'item_content2' => NULL,
                'item_content3' => NULL,
                'item_content4' => NULL,
                'item_content5' => NULL,
                'created_at' => now(),
            ],

            // 質問の集合体②
            [
                'question_group' => '20210101',
                'form_types_code' => '1',
                'user_code' => '100',
                'content' => '現在どのプロジェクトを担当していますか？',
                'selectable_item' => '0',
                'item_content1' => NULL,
                'item_content2' => NULL,
                'item_content3' => NULL,
                'item_content4' => NULL,
                'item_content5' => NULL,
                'created_at' => now(),
            ],
            [
                'question_group' => '20210101',
                'form_types_code' => '2',
                'user_code' => '100',
                'content' => 'プロジェクトの進捗はいかがですか？',
                'selectable_item' => '5',
                'item_content1' => '大変良好',
                'item_content2' => '良好',
                'item_content3' => '普通',
                'item_content4' => 'あまり進んでいない',
                'item_content5' => '全然進んでいない',
                'created_at' => now(),
            ],
            [
                'question_group' => '20210101',
                'form_types_code' => '1',
                'user_code' => '100',
                'content' => '何か伝えたいことはありますか？',
                'selectable_item' => '0',
                'item_content1' => NULL,
                'item_content2' => NULL,
                'item_content3' => NULL,
                'item_content4' => NULL,
                'item_content5' => NULL,
                'created_at' => now(),
            ],










        ]);
    }
}
