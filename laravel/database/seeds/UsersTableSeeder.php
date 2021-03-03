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
        DB::table('users')->insert([
            [
                'code' => '111',
                'role_code' => 'ADMIN',
                'name' => 'アドミン 太郎',
                'email' => 'admin@admin.com',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => '222',
                'role_code' => 'ORDINARY',
                'name' => 'ユーザー 次郎',
                'email' => 'user@user.com',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => '000',
                'role_code' => 'ADMIN',
                'name' => '高橋 達',
                'email' => 'takahashi@barnet.co.jp',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => '003',
                'role_code' => 'ORDINARY',
                'name' => '西宮 良治',
                'email' => 'y-nishimiya@barnet.co.jp',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => '009',
                'role_code' => 'ORDINARY',
                'name' => '冨澤 奈奈',
                'email' => 'tomizawa@barnet.co.jp',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => '011',
                'role_code' => 'ORDINARY',
                'name' => '小林 泰徳',
                'email' => 'kobayashi@barnet.co.jp',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => '014',
                'role_code' => 'ORDINARY',
                'name' => '高橋 圭',
                'email' => 'kei@barnet.co.jp',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => '016',
                'role_code' => 'ORDINARY',
                'name' => '村畑 一樹',
                'email' => 'murahata@barnet.co.jp',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => '023',
                'role_code' => 'ORDINARY',
                'name' => '吉崎 裕貴',
                'email' => 'yoshizaki@barnet.co.jp',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => '025',
                'role_code' => 'ORDINARY',
                'name' => '亀田 朋幸',
                'email' => 'kameda@barnet.co.jp',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => '027',
                'role_code' => 'ORDINARY',
                'name' => '米澤 健一郎',
                'email' => 'yonezawa@barnet.co.jp',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => '029',
                'role_code' => 'ORDINARY',
                'name' => '大川 泰慶',
                'email' => 'ohkawa@barnet.co.jp',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => '035',
                'role_code' => 'ORDINARY',
                'name' => '松尾 治仁',
                'email' => 'matsuo@barnet.co.jp',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => '036',
                'role_code' => 'ORDINARY',
                'name' => '星 孝明',
                'email' => 'hoshi@barnet.co.jp',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => '037',
                'role_code' => 'ORDINARY',
                'name' => '牛山 聡子',
                'email' => 'ushiyama@barnet.co.jp',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => '038',
                'role_code' => 'ORDINARY',
                'name' => '簾 実梨',
                'email' => 'sudare@barnet.co.jp',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => '040',
                'role_code' => 'ORDINARY',
                'name' => '清水 卓也',
                'email' => 'shimizu@barnet.co.jp',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => '041',
                'role_code' => 'ORDINARY',
                'name' => '高橋 美咲',
                'email' => 'm-takahashi@barnet.co.jp',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => '043',
                'role_code' => 'ORDINARY',
                'name' => 'Lotino Ron Jefferson',
                'email' => 'lotino@barnet.co.jp',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => '044',
                'role_code' => 'ORDINARY',
                'name' => '高木 航暉',
                'email' => 'takagi@barnet.co.jp',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => '045',
                'role_code' => 'ORDINARY',
                'name' => '鍵村 和範',
                'email' => 'kagimura@barnet.co.jp',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => '046',
                'role_code' => 'ORDINARY',
                'name' => '菅原 大輝',
                'email' => 'd-sugawara@barnet.co.jp',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => '047',
                'role_code' => 'ORDINARY',
                'name' => '関川 康裕',
                'email' => 'sekikawa@barnet.co.jp',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => '048',
                'role_code' => 'ORDINARY',
                'name' => '藤井 祐輔',
                'email' => 'fujii@barnet.co.jp',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],


        ]);
    }
}
