<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Question;

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
     */
    public function accountStore(Request $req)
    {
        $user = new User;
        $data = $req->all();
        $user->fill($data)->save();
        return redirect('/admin/account/list');
    }

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
        $enqueteNames = [
            '雛形１', '雛形２', '雛形３', '雛形４', '雛形５', '雛形６', '雛形７', '雛形８', '雛形９', '雛形１０',
        ];
        return view('/admin/enquete/list')->with('enqueteNames', $enqueteNames);
    }

    /**
     * 出題（予定）アンケート作成
     */
    public function enqueteCreate()
    {
        return view('/admin/enquete/create');
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

    /**
     * 回答済アンケート
     */
    // TODO: 途中
    public function enqueteAnswerList()
    {
        //DB値取得
        $questions = Question::orderBy('id', 'desc')->paginate(5);
        return view('/admin/enquete/answerList')->with('questions', $questions);

        // $users = User::orderBy('id', 'desc')->paginate(12);
        // return view('/admin/account/list')->with('users', $users);
    }

    public function enquetAnswerUser()
    {
        $users = User::orderBy('id', 'desc')->paginate(12);
        // dd($users);
        return view('/admin/enquete/answerUserList')->with('users', $users);
    }
    
    public function answer($id)
    {
        $user = User::findOrFail($id);
        // dd($users);
        // $users = User::orderBy('id', 'desc')->paginate(12);
        $questions = Question::orderBy('id', 'desc')->paginate(5);
        // デバッグ
        // dd($questions);
        // return view('/admin/enquete/answerList/answerUserList/answer')->with('questions', $questions);
        return view('/admin/enquete/answer')->with('questions', $questions)->with('user', $user);
    }


}
