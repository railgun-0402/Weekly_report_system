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
        $user = \Auth::user();
        $user_role = $user->role_code; 
        // dd($user->role_code);
        $role_check = "";
        if ($user_role == "ADMIN")
        {
            $role_check = '/admin/top';
        }
        elseif ($user_role == "ORDINARY")
        {
            $role_check = '/user/top';
        }
        return view('/user/enquete/changePass')->with('role_check', $role_check);
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
