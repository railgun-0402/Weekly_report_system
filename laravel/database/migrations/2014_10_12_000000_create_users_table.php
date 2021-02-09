<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            // TODO: 一時的に nullable 指定のカラム設定中
            $table->bigIncrements('id');
            $table->string('code')->nullable();
            $table->string('role_code')->nullable();
            $table->string('name')->nullable();
            // $table->string('email')->unique(); もともとの設定
            $table->string('email');
            $table->string('full_name')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            // 論理削除フラグ
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
