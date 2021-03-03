<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            [
                'code' => '1',
                'name' => '管理者',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => '2',
                'name' => '一般社員',
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}
