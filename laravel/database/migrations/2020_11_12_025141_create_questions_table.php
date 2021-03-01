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
            $table->string('question_group')->nullable();
            $table->string('form_types_code')->nullable();
            $table->string('user_code')->nullable();
            $table->string('selectable_item')->nullable();
            $table->string('item_content1')->nullable();
            $table->string('item_content2')->nullable();
            $table->string('item_content3')->nullable();
            $table->string('item_content4')->nullable();
            $table->string('item_content5')->nullable();
            $table->string('content')->nullable();
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
