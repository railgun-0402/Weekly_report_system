<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Question;
use App\FormType;
use App\Answer;

class AdminController extends Controller
{
    /**
     * 管理者TOP画面
     */
    public function top()
    {
        return view('/admin/top');
    }

    /**
     * アカウント一覧
     */
    public function accountList()
    {

        $users = User::orderBy('code', 'asc')->get();
        return view('/admin/account/list', compact('users'));
    }


    /**
     * 削除候補リスト一覧画面用
     */
    public function accountDeleteList()
    {
        $users = \DB::table('users')->get();
        $usersArray = $users->toArray();
        return view('/admin/account/deleteList')->with('usersArray', $usersArray);
    }


    /**
     * アカウント編集
     */
    public function accountEdit($id)
    {
        $user = User::findOrFail($id);
        return view('/admin/account/edit')->with('user', $user);
    }

    /**
     * アカウント編集->更新
     */
    public function accountUpdate(Request $req, $id)
    {
        $user = User::findOrFail($id);
        $data = $req->all();
        $user->fill($data)->save();
        return redirect('/admin/account/list');
    }

    /**
     * アカウント作成
     */
    public function accountCreate()
    {
        return redirect('/register');
    }

    /**
     * アカウント作成処理
     * RegisterController に任せる
     */

    /**
     * アカウント削除
     */
    public function accountDestroy(User $user)
    {
        $user->delete();
        return redirect()->back();
    }


    /**
     * アンケート参照・編集
    */
    public function enqueteEdit()
    {
        $questions = Question::all();
        $form_types = FormType::all();
        $now = date("Ymd");
        return view('/admin/enquete/edit', compact('questions', 'form_types', 'now'));
    }

    /**
     * アンケート更新
    */
    public function enqueteUpdate(Request $req)
    {
        // ユーザー
        $user = \Auth::user();
        // これがanswerテーブルのuser_codeにあたる
        $user_code = $user->code;

        // 現在日(question_group)
        $date = date("Ymd");
        // dd($req);

        // 選択肢→nullではない数を数えるortextBox
        for ($i=1; $i<=7; $i++) {
            // 選択肢の数
            $selectable_item = 5;

            $req->form_types_code.$i; // メモ：リクエストを受け取る "$req->変数" の記述にインクリメントの$iを連結してもリクエストの値を取ってくれなかった

            // 文字列を連結する
            $content = 'content'.$i;
            $form_types_code = 'form_types_code'.$i;
            $form_types_code_num = $req->$form_types_code;
            $item_contents1 = 'item_content1'.$i;
            $item_contents2 = 'item_content2'.$i;
            $item_contents3 = 'item_content3'.$i;
            $item_contents4 = 'item_content4'.$i;
            $item_contents5 = 'item_content5'.$i;
            $outContent = $req->$content;

            // 値を代入
            $item_content1 = $req->$item_contents1;
            $item_content2 = $req->$item_contents2;
            $item_content3 = $req->$item_contents3;
            $item_content4 = $req->$item_contents4;
            $item_content5 = $req->$item_contents5;

            // dd($form_types_code_num);

            if ($form_types_code_num == 1)
            {
                $selectable_item = 0;
            }
            else
            {
                if ($item_content1 == null){
                    $selectable_item -= 1;
                }

                if ($item_content2 == null){
                    $selectable_item -= 1;
                }

                if ($item_content3 == null){
                    $selectable_item -= 1;
                }

                if ($item_content4 == null){
                    $selectable_item -= 1;
                }

                if ($item_content5 == null){
                    $selectable_item -= 1;
                }
            }

            $update = ['question_group' => $date, 'user_code' => $user_code, 'selectable_item' => $selectable_item, 'content' => $outContent, 'form_types_code' => $form_types_code_num, 'item_content1' => $item_content1, 'item_content2' => $item_content2, 'item_content3' => $item_content3, 'item_content4' => $item_content4, 'item_content5' => $item_content5, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()];
            DB::table('questions')->whereIn('id', [$i])->update($update);
        }
        return redirect('/admin/enquete/edit');
    }


    /**
     * 配信（予定）アンケート詳細
     */
    public function enqueteShow($question_group)
    {
        $questions = Question::where('question_group', '=', $question_group)->get();
        $form_types = FormType::get();
        return view('/admin/enquete/show', compact('questions', 'form_types'));
    }

    /**
     * 回答済みアンケート参照
     */
    public function answeredList()
    {
        $users = User::orderBy('code', 'asc')->where('role_code', 'ORDINARY')->get();
        return view('/admin/answered/list', compact('users'));
    }
    /**
     * アンケート回答者日付一覧
     */
    public function answeredDate($id)
    {
        // 必要なものは
        // 「user_code」「question_id(date)」

        $user = User::findOrFail($id); // 該当idのユーザー全情報
        $user_code = $user->code;      // 該当idのユーザーのcode（誰の回答を出力するか）

        // question_group
        $answers = \DB::table('answers')->get();
        $answersArray = $answers->toArray();

        // dd($answersArray);

        // $answers = Answer::where($user_code);
        // Question::where('question_group', '=', $question_group)->get();

        return view('/admin/answered/date')
        ->with('user', $user)
        ->with('answersArray', $answersArray);
    }

    /**
     * アンケート回答者日付一覧
     * 第一引数：質問回答日「question_id」
     * 第二引数：ユーザーコード「user_id」
     */
    public function answeredShow($question_id, $user_id)
    {
        // 質問を全部表示
        $questions = \DB::table('questions')->get();
        $questionsArray = $questions->toArray();

        // 回答した日「question_id」と誰の答え「user_code」がほしい
        $answers = Answer::where('question_id', $question_id)
                         ->where('user_code', $user_id)
                         ->get();

        $answersArray = $answers->toArray();

        return view('/admin/answered/show')
        ->with('questions', $questions)
        ->with('questionsArray', $questionsArray)
        ->with('answers', $answers)
        ->with('answersArray', $answersArray);
    }
}
