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
     * 作成済みアンケート一覧
     *
    */
    public function makeList($makeDate)
    {
        // 質問内容
        $questions = Question::all();
        $form_types = FormType::all();
        // 本日の日時
        $now = date("Ymd");

        return view('/admin/enquete/makeList', compact('questions', 'form_types', 'now', 'makeDate'));
    }

    /**
     * アンケート一覧
     * 作成日ごとにグループ化させる
     * 作成日をリンクとして扱い、押下すると対象リンク記述名の
     * 質問が出てくる仕組みになる
    */
    public function enqueteList()
    {
        // 質問を全部表示
        $questions = \DB::table('questions')->get();
        $questionsArray = $questions->toArray();

        return view('/admin/enquete/questionList', compact('questions', 'questionsArray'));
    }


    /**
     * アンケート参照・編集
     * 前画面で押下されたリンクの記述日が反映される
    */
    public function enqueteEdit()
    {
        // 質問内容
        $questions = Question::all();
        $form_types = FormType::all();
        // 本日の日時
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

            // 内容が「null」であれば空欄で出したと思われるので登録はしない
            if ($outContent != null)
            {
                $insert = ['question_group' => $date, 'user_code' => $user_code, 'selectable_item' => $selectable_item, 'content' => $outContent, 'form_types_code' => $form_types_code_num, 'item_content1' => $item_content1, 'item_content2' => $item_content2, 'item_content3' => $item_content3, 'item_content4' => $item_content4, 'item_content5' => $item_content5, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()];
                DB::table('questions')->whereIn('id', [$i])->insert($insert);
            }

        }
        return redirect('/admin/enquete/questionList')->with('complete_message', 'アンケートを登録しました');
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
     * 質問の集合体の削除
     * 引数に渡された値をquestionsのquestion_groupの条件に指定し対象行を削除
     */
    public function destroyGroupQuestion($question_group)
    {
        DB::table('questions')->where('question_group', $question_group)->delete();
        return redirect()->back();
    }


    /**
     * 個別で質問を削除
     */
    public function destroyQuestion($id)
    {
        DB::table('questions')->where('id', $id)->delete();
        return redirect()->back();
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

        // Request(質問の回答日_question_id)該当の答えをまず持ってくる
        // 質問作成日の「question_group」と「make_question」が同一のものをとってくる

        // Questionテーブルで必要なのは「question_group」と「content」
        // 質問を全部取得
        $questions = \DB::table('questions')->get();
        $questionsArray = $questions->toArray();

        // 回答した日「question_id」と誰の答え「user_code」がほしい
        $answers = Answer::where('question_id', $question_id) // 質問を作成した日と回答した日付が一緒
                         ->where('user_code', $user_id)
                         ->get();
        $answersArray = $answers->toArray();

        // 質問作成日の「question_group」と「make_question」のデータを管理する配列
        // 質問側
        $judgeQuestionArray = [];
        // 答え側
        $judgeAnswerArray = [];

        // ここで、$answersArrayと$questionsArrayから、「question_group」と「make_question」
        // の等しいものをとってくる
        for ($i = 0; $i < count($questionsArray); $i++)
        {
            // Questionテーブルの「question_group」
            $question_group = $questionsArray[$i]->question_group;

            // Answerテーブルの「make_question」
            // AnswerとQuestionのデータ数は異なるのでネストして調べる
            foreach ($answers as $ans)
            {
                $make_question = $ans->make_question;
                if ($make_question == $question_group)
                {
                 // 配列に追加
                 array_push($judgeQuestionArray, $questionsArray[$i]->content);
                 array_push($judgeAnswerArray, $ans->content);
                }
            }
        }
        // 重複を取り除く(これが表示する配列となる)
        $resultQuestionArray = array_unique($judgeQuestionArray);
        $resultAnswerArray = array_unique($judgeAnswerArray);

        return view('/admin/answered/show')
        ->with('questions', $questions)
        ->with('questionsArray', $questionsArray)
        ->with('answers', $answers)
        ->with('answersArray', $answersArray)
        ->with('resultQuestionArray', $resultQuestionArray)
        ->with('resultAnswerArray', $resultAnswerArray);
    }
}
