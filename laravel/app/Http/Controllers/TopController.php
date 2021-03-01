<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TopController extends Controller
{
    public function index()
    {
        // 現在認証されているユーザー情報の取得
        $user = Auth::user();

        // 遷移先URLの振り分け
        if ($user->role_code === 'ORDINARY') {
            return view('/user/top');
        } elseif ($user->role_code === 'ADMIN') {
            return view('/admin/top');
        } elseif (!$user->role_code) {
            Auth::logout();
            return view('/');
        } else {
            Auth::logout();
            return view('/');
        }
    }
}
