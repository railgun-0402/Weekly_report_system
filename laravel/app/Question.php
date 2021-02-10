<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// 論理削除有効化 ： Eloquentのdestory,delete methodをした際に論理削除されるようになります。
use Illuminate\Database\Eloquent\SoftDeletes;

class Question extends Model
{
    // 論理削除有効化 ： Eloquentのdestory,delete methodをした際に論理削除されるようになります。
    use SoftDeletes;

    // テーブル名を明示的に指定（必要はないが可読性向上の為）
    protected $table = 'questions';

    // 書き換えることが出来るカラムをホワイトリスト形式で指定
    // protected $fillable = [
    //     'question_group',
    //     'form_types_code',
    //     'user_code',
    //     'selectable_item',
    //     'item_content1',
    //     'item_content2',
    //     'item_content3',
    //     'item_content4',
    //     'item_content5',
    //     'content'
    // ];
    protected $guarded = []; //一旦これ



    // timestampの自動更新を利用する
    public $timestamps = true;

    // ==============================
    // リレーション定義
    // ==============================

}
