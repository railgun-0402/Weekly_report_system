<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FormTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('form_types')->insert([
            [
                'code' => '1',
                'name' => 'テキストボックス',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => '2',
                'name' => 'ラジオボタン',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => '3',
                'name' => 'チェックボックス',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => '4',
                'name' => 'ドロップダウンメニュー',
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}
