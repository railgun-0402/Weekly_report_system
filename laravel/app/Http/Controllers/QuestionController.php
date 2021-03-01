<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Request;
// use Request as PostRequest;


class QuestionController extends Controller
{
    public function questionList()
    {
        // TODO: where 2 は仮 question_codeが同一の値のレコードを取得
        $items = \App\Question::where('question_group', 2)->get();
        $users = \App\Question::orderBy('id', 'desc')->paginate(10);
        return view('/user/enquete/list')
            ->with('items', $items)
            ->with('users', $users);
    }

    public function questionIndex(Request $request)
    {
        // TODO: １回分のアンケート（question_groupが同一値）whereは仮
        // $items = \App\Question::where('question_group', mt_rand(1, 10))->get();
        $items = \DB::table('questions')->get();

        $itemsArray = $items->toArray();

        // 受け取りデータ渡し
        //$data = $request::all();

        // use Illuminate\Support\Facades\DB;
        // $itemsArray = DB::table('questions')->where('question_group', 2)->get();
        // dd($itemsArray);

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
        // アンケート取得
        // $items = \App\Question::where('question_group', 2)->get();
        $items = \DB::table('questions')->get();

        $itemsArray = $items->toArray();
        // dd($itemsArray);

         // 受け取りデータ渡し
         $data = Request::all();         
        // dd($data);         

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

        // 質問FK
        $items = \DB::table('questions')->get();
        $itemsArray = $items->toArray();
        // dd($itemsArray);
        // dd(count($itemsArray));
        
        // 答え
        $answer = Request::all();
        $data = \DB::table('answers')->get();

        $key = 0;
        $con = '';
        // dd($answer);

        // answersマスタへ、DBに追加
        // answerは配列なので、一つずつ取り出す
        // 必要物：
        // 「question_id」 「user_code」 「content」
        foreach ($itemsArray as $item)
        {
            $key = $key + 1;
            # 答えの配列から一つずつ取り出し
            $add_answer = array_slice($answer, $key, 1);
            # でてくる値は配列なので先頭をとりだしてやる
            $first_array = array_shift($add_answer);
            # チェックボックスの場合、複数あることから配列になるので判断する
            $judge = is_array($first_array);
            
            # 配列すなわちチェックボックスの場合
            # 全部取り出してやる
            if ($judge == 'true'){
                foreach ($first_array as $arr){
                    // $con += '・' + $arr;                    
                    $update = ['question_id' => $item->question_group, 'user_code' => $user_code, 'content' => $arr, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()];
                    DB::table('answers')->insert($update);            
                }
            }
            # 配列でない場合、先頭だけ取ればよい
            else {
                $update = ['question_id' => $item->question_group, 'user_code' => $user_code, 'content' => $first_array, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()];
                DB::table('answers')->insert($update);       
            }

        }
        return view('/user/enquete/complete');
    }
}
