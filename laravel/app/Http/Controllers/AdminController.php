<?php

namespace App\Http\Controllers;

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
        // TODO: あとでトランザクションを入れたいです
        $user->delete();
        return redirect()->back();
    }

    /**
     * 配信（予定）アンケート一覧
     */
    public function enqueteList()
    {
        // TODO: 仮のアンケート名をべた書きしてますアンケート名を入れるテーブルもしくはカラムが必要かもしれないです
        // $enqueteNames = [
        //     '雛形１', '雛形２', '雛形３', '雛形４', '雛形５', '雛形６', '雛形７', '雛形８', '雛形９', '雛形１０',
        // ];
        // return view('/admin/enquete/list')->with('enqueteNames', $enqueteNames);
        return view('/admin/enquete/list');
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
    public function enqueteUpdate(Request $req, $id)
    {}

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
