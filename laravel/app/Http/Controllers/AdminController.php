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
        $users = User::orderBy('id', 'desc')->paginate(12);
        return view('/admin/account/list')->with('users', $users);
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
     * アンケート更新（一応残す）
    */
    // public function enqueteUpdateSub(Request $req)
    // {
    //     $updates = [
    //         ['question_group' => $req->question_group, 'content' => $req->content1, 'form_types_code' => $req->form_types_code1, 'item_content1' => $req->item_content11, 'item_content2' => $req->item_content21, 'item_content3' => $req->item_content31, 'item_content4' => $req->item_content41, 'item_content5' => $req->item_content51, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
    //         ['question_group' => $req->question_group, 'content' => $req->content2, 'form_types_code' => $req->form_types_code2, 'item_content1' => $req->item_content12, 'item_content2' => $req->item_content22, 'item_content3' => $req->item_content32, 'item_content4' => $req->item_content42, 'item_content5' => $req->item_content52, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
    //         ['question_group' => $req->question_group, 'content' => $req->content3, 'form_types_code' => $req->form_types_code3, 'item_content1' => $req->item_content13, 'item_content2' => $req->item_content23, 'item_content3' => $req->item_content33, 'item_content4' => $req->item_content43, 'item_content5' => $req->item_content53, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
    //         ['question_group' => $req->question_group, 'content' => $req->content4, 'form_types_code' => $req->form_types_code4, 'item_content1' => $req->item_content14, 'item_content2' => $req->item_content24, 'item_content3' => $req->item_content34, 'item_content4' => $req->item_content44, 'item_content5' => $req->item_content54, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
    //         ['question_group' => $req->question_group, 'content' => $req->content5, 'form_types_code' => $req->form_types_code5, 'item_content1' => $req->item_content15, 'item_content2' => $req->item_content25, 'item_content3' => $req->item_content35, 'item_content4' => $req->item_content45, 'item_content5' => $req->item_content55, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
    //         ['question_group' => $req->question_group, 'content' => $req->content6, 'form_types_code' => $req->form_types_code6, 'item_content1' => $req->item_content16, 'item_content2' => $req->item_content26, 'item_content3' => $req->item_content36, 'item_content4' => $req->item_content46, 'item_content5' => $req->item_content56, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
    //         ['question_group' => $req->question_group, 'content' => $req->content7, 'form_types_code' => $req->form_types_code7, 'item_content1' => $req->item_content17, 'item_content2' => $req->item_content27, 'item_content3' => $req->item_content37, 'item_content4' => $req->item_content47, 'item_content5' => $req->item_content57, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
    //     ];
    //     for ($i=1; $i<=7; $i++) {
    //         DB::table('questions')->whereIn('id', [$i])->update($updates[$i-1]);
    //     }
    //     return redirect('/admin/enquete/edit');
    // }

    /**
     * 回答済みアンケート参照
     */
    public function answeredList()
    {
        $users = User::orderBy('code', 'asc')->get();
        return view('/admin/answered/list', compact('users'));
    }

    /**
     * アンケート回答者日付一覧
     */
    public function answeredDate($id)
    {

        $user = User::findOrFail($id); // 該当idのユーザー全情報
        $user_code = $user->code;      // 該当idのユーザーのcode（誰の回答を出力するか）

        // $answers = Answer::where($user_code);
        // Question::where('question_group', '=', $question_group)->get();




        return view('/admin/answered/date', compact('user', 'answers'));
    }

    /**
     * アンケート回答者日付一覧
     */
    public function answeredShow()
    {
        // $answers = Answer::findOrFail($answers);
        // dd($answers);
        return view('/admin/answered/show');
    }









}
