<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Answer extends Model
{
    // 論理削除有効化 ： Eloquentのdestory,delete methodをした際に論理削除されるようになります。
    use SoftDeletes;

    // テーブル名を明示的に指定（必要はないが可読性向上の為）
    protected $table = 'answers';

    // 代入を許可しない属性を配列で設定
    protected $guarded = [];

    // timestampの自動更新を利用する
    public $timestamps = true;

}
