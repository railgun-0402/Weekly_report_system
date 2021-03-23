<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TopController extends Controller
{
    public function index()
    {
        // ユーザー情報により遷移先URLの振り分け
        $user = Auth::user();
        
        // dd($user->role_code);
        if ($user->role_code === 'ORDINARY') {
            return redirect('/user/top');
        } elseif ($user->role_code === 'ADMIN') {
            return redirect('/admin/top');
        } elseif (!$user->role_code) {
            Auth::logout();
            return view('/');
        } else {
            Auth::logout();
            return view('/');
        }
    }
}
