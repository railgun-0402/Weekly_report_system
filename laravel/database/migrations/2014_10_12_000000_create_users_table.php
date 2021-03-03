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
            $table->bigIncrements('id')->comment('ID');
            $table->string('code')->nullable()->comment('社員番号');
            $table->string('role_code')->nullable()->comment('社員番号');
            $table->string('full_name')->nullable()->comment('氏名');
            // $table->string('name')->nullable();
            $table->string('email')->nullable()->comment('Eメールアドレス');
            // $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->comment('パスワード');
            $table->rememberToken()->comment('ログイン保持トークン');
            $table->timestamps();
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
