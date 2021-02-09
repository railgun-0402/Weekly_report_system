<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('question_group');
            $table->string('form_types_code');
            $table->string('user_code');
            $table->string('selectable_item');
            $table->string('item_content1');
            $table->string('item_content2');
            $table->string('item_content3');
            $table->string('item_content4');
            $table->string('item_content5');
            $table->string('content');
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
        Schema::dropIfExists('questions');
    }
}
