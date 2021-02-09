<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TopController extends Controller
{
    public function index()
    {
        // 現在認証されているユーザー情報の取得
        $user = \Auth::user();

        // TODO: 新規登録後の挙動が変
        // TODO: まだユーザー登録は画面からしない想定
        // TODO: ロールによって画面遷移先を変えるがルーティングでやった方がいいかもしれない
        if ($user->role_code === 'ORDINARY') {
            return view('/user/top');
        } elseif ($user->role_code === 'ADMIN') {
            return view('/admin/top');
        } elseif (!$user->role_code) {
            return view('/user/top');
        } else {
            Auth::logout();
        }
    }
}
