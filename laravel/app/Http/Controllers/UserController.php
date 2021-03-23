<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DateTime;

class UserController extends Controller
{
    public function top()
    {
        // ログイン情報取得
        $user = \Auth::user();

        // 近日に回答が既にあるようならば、回答はまだ必要ないといった
        // 文言をつける        
        $user_answered_date = \DB::table('answers')->where('user_code', $user->code)->get()->toArray();
        // dd($user_answered_date);

        // 最新日時管理
        $new_date = '';

        foreach ($user_answered_date as $data)
        {
            $answer_date_data = $data->question_id;
            $answer_date_data = (string)$answer_date_data;
                                    
            if (new DateTime($answer_date_data) > new DateTime($new_date))
            {
                $new_date = $answer_date_data;

            } elseif ($new_date == '')
            {
                $new_date = $answer_date_data;
            }
        }

        $next_answer_date = '';
        
        if ($new_date != '')
        {
            $next_answer_date = new DateTime($new_date);
            $next_answer_date = $next_answer_date->modify('+7 days');
            $next_answer_date = $next_answer_date->format('Ymd');           
        }

        $dialog = '';
        $today = date("Ymd");
        if (new DateTime($next_answer_date) < new DateTime($today))
        {
            $dialog = "前回の回答から一週間が既に経過していますので、\nご回答をお願い致します。";
        }

        return view('/user/top')
        ->with('next_answer_date', $next_answer_date)
        ->with('today', $today);
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
