<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
// 論理削除有効化
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    // 論理削除有効化 ： Eloquentのdestory,delete methodをした際に論理削除されるようになります。
    use SoftDeletes;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    /*
    protected $fillable = [
        // 'id',
        'code',
        'role_code',
        'name',
        'email',
        'full_name',
        // 'email_verified_at',
        'password',
        // 'remember_token',
        // 'created_at',
        // 'updated_at',
        // 'deleted_at',
    ];
    */
    protected $guarded = []; //一旦これ

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    // protected $hidden = [
    //     'password', 'remember_token',
    // ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // timestampの自動更新を利用する
    public $timestamps = true;

    // ==============================
    // リレーション定義
    // ==============================

}
