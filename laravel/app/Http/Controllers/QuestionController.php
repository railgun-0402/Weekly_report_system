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
        $items = \App\Question::where('question_group', mt_rand(1, 10))->get();

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
        $items = \App\Question::where('question_group', 2)->get();

        $itemsArray = $items->toArray();

         // 受け取りデータ渡し
         $data = PostRequest::all();                  

        return view('/user/enquete/confirmation')
                ->with('items', $items)
                ->with('itemsArray', $itemsArray)
                ->with('request', $request)
                ->with(compact('data'));
    }

}
