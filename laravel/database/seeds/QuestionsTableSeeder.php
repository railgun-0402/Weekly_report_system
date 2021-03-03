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
            ['id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 4, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 5, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 6, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 7, 'created_at' => now(), 'updated_at' => now()],

        ]);
    }
}
