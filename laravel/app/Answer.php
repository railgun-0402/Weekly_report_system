<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// 論理削除有効化 ： Eloquentのdestory,delete methodをした際に論理削除されるようになります。
use Illuminate\Database\Eloquent\SoftDeletes;

class Answer extends Model
{
    // 論理削除有効化 ： Eloquentのdestory,delete methodをした際に論理削除されるようになります。
    use SoftDeletes;

    // テーブル名を明示的に指定（必要はないが可読性向上の為）
    protected $table = 'answers';

    // 書き換えることが出来るカラムをホワイトリスト形式で指定
    protected $fillable = [
        'question_id',
        'user_code',
        'content'
    ];

    // timestampの自動更新を利用する
    public $timestamps = true;

    // ==============================
    // リレーション定義
    // ==============================

}
