<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function top()
    {
        return view('/user/top');
    }

    public function editPassword()
    {
        return view('/user/enquete/changePass');
    }

    public function updatePassword(UpdatePassRequest $request)
    {
        // まずはログイン情報で現在のパスワードを得る
        $user = \Auth::user();
        
        $user->password = bcrypt($request->get('new-password'));
        $user->save();

        return redirect()->back()->with('update_password_success', 'パスワードを変更しました。');

    }
}
