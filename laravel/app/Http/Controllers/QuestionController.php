<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Request;


class QuestionController extends Controller
{
    public function questionIndex(Request $request)
    {
        // 最新の値を得たい
        $newDate = '';

        $dateArray = \DB::table('questions')->select('question_group')->get();
        foreach ($dateArray as $date){
            if ($date->question_group > $newDate){
                $newDate = $date->question_group;

            } elseif ($newDate == ''){
                $newDate = $date->question_group;
            }
        }

        // 最新の日付の質問だけ表示
        $items = \DB::table('questions')->where('question_group', $newDate)->get();
        $itemsArray = $items->toArray(); 

        // 受け取りデータ渡し
        return view('/user/enquete/index')
                ->with('items', $items)
                ->with('itemsArray', $itemsArray)
                ->with('request', $request);
    }

    /*
    アンケート確認画面
    */
    public function questionConfirmation(Request $request)
    {
        // 最新の値を得たい
        $newDate = '';

        $dateArray = \DB::table('questions')->select('question_group')->get();
        foreach ($dateArray as $date){
            if ($date->question_group > $newDate){
                $newDate = $date->question_group;

            } elseif ($newDate == ''){
                $newDate = $date->question_group;
            }
        }

        // アンケート取得
        $items = \DB::table('questions')->where('question_group', $newDate)->get();
        $itemsArray = $items->toArray();

        // 受け取りデータ渡し
        $data = Request::all();

        return view('/user/enquete/confirmation')
                ->with('items', $items)
                ->with('itemsArray', $itemsArray)
                ->with('request', $request)
                ->with(compact('data'));
    }

    public function complete(Request $request)
    {
        // ユーザー
        $user = \Auth::user();
        // これがanswerテーブルのuser_codeにあたる
        $user_code = $user->code;

        // 最新の値を得たい
        $newDate = '';

        $dateArray = \DB::table('questions')->select('question_group')->get();
        foreach ($dateArray as $date){
            if ($date->question_group > $newDate){
                $newDate = $date->question_group;

            } elseif ($newDate == ''){
                $newDate = $date->question_group;
            }
        }
        // 質問FK
        $items = \DB::table('questions')->where('question_group', $newDate)->get();
        $itemsArray = $items->toArray();

        // 答え
        $answer = Request::all();
        $data = \DB::table('answers')->get();

        $key = 0;
        $con = '';

        // answersマスタへ、DBに追加
        // answerは配列なので、一つずつ取り出す
        // 必要物：
        // 「question_id」 「user_code」 「content」
        foreach ($itemsArray as $item)
        {
            // 質問がnullだったらDB更新の必要なし
            if ($item->content == null)
            {
                break;
            }

            $key = $key + 1;
            # 答えの配列から一つずつ取り出し
            $add_answer = array_slice($answer, $key, 1);
            # でてくる値は配列なので先頭をとりだしてやる
            $first_array = array_shift($add_answer);
            # チェックボックスの場合、複数あることから配列になるので判断する
            $judge = is_array($first_array);
            # 質問作成日を取得する
            $make_question = $item->question_group;

            # 配列すなわちチェックボックスの場合
            # 全部取り出してやる
            if ($judge == 'true'){
                $con = '';
                foreach ($first_array as $arr){
                    $con .= $arr . '  ';
                }
                $update = ['question_id' => date('Ymd'), 'make_question' => $make_question, 'user_code' => $user_code, 'content' => $con, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()];
                DB::table('answers')->insert($update);
            }
            # 配列でない場合、先頭だけ取ればよい
            else {
                $update = ['question_id' => date('Ymd'), 'make_question' => $make_question, 'user_code' => $user_code, 'content' => $first_array, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()];
                DB::table('answers')->insert($update);
            }
        }
        return view('/user/enquete/complete');
    }
}
