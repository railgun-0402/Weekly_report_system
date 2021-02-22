<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Question;
use App\FormType;

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
    // TODO: データ更新時、標準で設定されているuesrs.emailのUNI制約をどう扱うか。
    // プログラムでバリデートするか、カラム設定でUNI制約を外すかどうか。
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
    public function enqueteEdit2()
    {
        $questions = Question::all();
        $form_types = FormType::all();
        return view('/admin/enquete/edit2', compact('questions', 'form_types'));
    }

    /**
     * アンケート更新
    */
    public function enqueteUpdate(Request $req)
    {
        $update1 = [ 'content' => $req->content1, 'form_types_code' => $req->form_types_code1, 'item_content1' => $req->item_content11, 'item_content2' => $req->item_content21, 'item_content3' => $req->item_content31, 'item_content4' => $req->item_content41, 'item_content5' => $req->item_content51, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()];
        DB::table('questions')->whereIn('id', [1])->update($update1);

        $update2 = [ 'content' => $req->content2, 'form_types_code' => $req->form_types_code2, 'item_content1' => $req->item_content12, 'item_content2' => $req->item_content22, 'item_content3' => $req->item_content32, 'item_content4' => $req->item_content42, 'item_content5' => $req->item_content52, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()];
        DB::table('questions')->whereIn('id', [2])->update($update2);

        $update3 = [ 'content' => $req->content3, 'form_types_code' => $req->form_types_code3, 'item_content1' => $req->item_content13, 'item_content2' => $req->item_content23, 'item_content3' => $req->item_content33, 'item_content4' => $req->item_content43, 'item_content5' => $req->item_content53, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()];
        DB::table('questions')->whereIn('id', [3])->update($update3);

        $update4 = [ 'content' => $req->content4, 'form_types_code' => $req->form_types_code4, 'item_content1' => $req->item_content14, 'item_content2' => $req->item_content24, 'item_content3' => $req->item_content34, 'item_content4' => $req->item_content44, 'item_content5' => $req->item_content54, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()];
        DB::table('questions')->whereIn('id', [4])->update($update4);

        $update5 = [ 'content' => $req->content5, 'form_types_code' => $req->form_types_code5, 'item_content1' => $req->item_content15, 'item_content2' => $req->item_content25, 'item_content3' => $req->item_content35, 'item_content4' => $req->item_content45, 'item_content5' => $req->item_content55, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()];
        DB::table('questions')->whereIn('id', [5])->update($update5);

        $update6 = [ 'content' => $req->content6, 'form_types_code' => $req->form_types_code6, 'item_content1' => $req->item_content16, 'item_content2' => $req->item_content26, 'item_content3' => $req->item_content36, 'item_content4' => $req->item_content46, 'item_content5' => $req->item_content56, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()];
        DB::table('questions')->whereIn('id', [6])->update($update6);

        $update7 = [ 'content' => $req->content7, 'form_types_code' => $req->form_types_code7, 'item_content1' => $req->item_content17, 'item_content2' => $req->item_content27, 'item_content3' => $req->item_content37, 'item_content4' => $req->item_content47, 'item_content5' => $req->item_content57, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()];
        DB::table('questions')->whereIn('id', [7])->update($update7);

        return redirect('/admin/enquete/edit2');
    }



    /**
     * 配信（予定）アンケート一覧
     */
    public function enqueteList()
    {
        $questions = Question::groupBy('question_group')->get(['question_group']); // TODO: 登録降順に表示されないので要修正
        return view('/admin/enquete/list')->with('questions', $questions);
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
     * 出題（予定）アンケート作成
     */
    public function enqueteCreate()
    {
        $form_types = FormType::get();
        return view('/admin/enquete/create')->with('form_types', $form_types);
    }

    /**
     * 出題（予定）アンケート作成 処理
     */
    public function enqueteStore(Request $req)
    {
        // $numbers_of_questions = $req->number_of_questions; //質問の数
        // ===============================================================
        // １問の登録のみならこちらでOK
        // $questions = new Question();
        // $data = $req->all();
        // $questions->fill($data)->save();
        // return redirect('/admin/enquete/list');
        // １問の登録のみならこちらでOK
        // ===============================================================

        // 質問を３つ登録
        $insertData = [
            ['question_group' => $req->question_group, 'content' => $req->content1, 'form_types_code' => $req->form_types_code1, 'item_content1' => $req->item_content11, 'item_content2' => $req->item_content21, 'item_content3' => $req->item_content31, 'item_content4' => $req->item_content41, 'item_content5' => $req->item_content51, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['question_group' => $req->question_group, 'content' => $req->content2, 'form_types_code' => $req->form_types_code2, 'item_content1' => $req->item_content12, 'item_content2' => $req->item_content22, 'item_content3' => $req->item_content32, 'item_content4' => $req->item_content42, 'item_content5' => $req->item_content52, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['question_group' => $req->question_group, 'content' => $req->content3, 'form_types_code' => $req->form_types_code3, 'item_content1' => $req->item_content13, 'item_content2' => $req->item_content23, 'item_content3' => $req->item_content33, 'item_content4' => $req->item_content43, 'item_content5' => $req->item_content53, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ];
        DB::table('questions')->insert($insertData);
        return redirect('/admin/enquete/list');
    }



    /**
     * 出題（予定）アンケート編集
     */
    public function enqueteEdit($id)
    {
        $question = Question::findOrFail($id);

        // TODO: １回分のアンケート（question_groupが同一値）whereは仮でランダム数字を出力
        $questions = Question::where('question_group', mt_rand(1,10))->get();
        return view('/admin/enquete/edit', compact('question', 'questions'));
    }

    /**
     * 出題（予定）アンケート更新
     */
    // TODO: 途中
    // public function enqueteUpdate(Request $req, $id)
    // {}

    /**
     * 出題（予定）アンケート削除
     */
    // TODO: 途中
    public function enqueteDestroy(Question $question)
    {
        // TODO: あとでトランザクションを入れたいです
        $question->delete();
        return redirect('/admin/enquete/list');
    }

}
