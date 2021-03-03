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
            $table->bigIncrements('id')->comment('ID');
            $table->string('question_group')->nullable()->comment('質問内容をグループ化する情報（日付）');
            $table->string('form_types_code')->nullable()->comment('使用されるフォーム部品');
            $table->string('user_code')->nullable()->comment('社員番号');
            $table->string('content')->nullable()->comment('出題する質問内容');
            $table->string('selectable_item')->nullable()->comment('回答する内容の選択肢の数');
            $table->string('item_content1')->nullable()->comment('回答選択肢の文章内容1');
            $table->string('item_content2')->nullable()->comment('回答選択肢の文章内容2');
            $table->string('item_content3')->nullable()->comment('回答選択肢の文章内容3');
            $table->string('item_content4')->nullable()->comment('回答選択肢の文章内容4');
            $table->string('item_content5')->nullable()->comment('回答選択肢の文章内容5');
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
        Schema::dropIfExists('questions');
    }
}
