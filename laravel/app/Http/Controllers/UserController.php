<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\User;

class UserController extends Controller
{
    public function top()
    {
        return view('/user/top');
    }

    public function accountIndex()
    {
        // 現在認証されているユーザー情報を取得しビューに渡す
        return view('/user/account/index')->with('user', \Auth::user());
    }

    public function accountEdit()
    {
        // 現在認証されているユーザー情報を取得しビューに渡す
        return view('/user/account/edit')->with('user', \Auth::user());
    }

    public function accountUpdate(Request $req)
    {
        $data = $req->all();
        $user = \Auth::user();
        $user->fill($data)->save();
        return redirect('/user/account/index'); // TODO: フラッシュメッセージを出したい
    }

    public function complete()
    {
        return view('/user/enquete/complete');
    }

}
