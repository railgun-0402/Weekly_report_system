<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Request as PostRequest;


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
        // dd($items);
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
         $data = PostRequest::all();         
        // dd($data);         

        return view('/user/enquete/confirmation')
                ->with('items', $items)
                ->with('itemsArray', $itemsArray)
                ->with('request', $request)
                ->compact('data');
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

        // 質問は複数あるので、foreachで回せる
        // foreach ($itemsArray as $item)
        // {
        //     $test = $item -> id;
        //     dd($test);
        // }

        // 答え
        $answer = PostRequest::all();
        $data = \DB::table('answers')->get();
        // dd($answer);
        // dd(array_slice($answer,2,1));
        // dd(count($answer));

        $key = 1;

        // answersマスタへ、DBに追加
        // answerは配列なので、一つずつ取り出す
        // 必要物：
        // 「question_id」 「user_code」 「content」
        foreach ($itemsArray as $item)
        {
            $key = $key + 1;
            $add_answer = array_slice($answer, $key, 1);
            \DB::table('answers')->save([
                'question_id' =>  $item,
                'user_code' => $user_code,
                'content' => $add_answer]);    
        }
    }

    // questionのマスタからidをもらう
    // answersのマスタへデータを加え、上記idも同様に入れる
    // public function questionUpdate(Request $request, $conf)
    // {
    //     $answer = App\Question::findOrFail($conf);
    //     dd($answer);
    //     $data = $request->all();
    // }
}
