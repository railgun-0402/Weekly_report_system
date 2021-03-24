<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => 'auth'], function() {

    Route::get('/', 'TopController@index');                                                // 権限によって出力する画面を変える

    // 一般ユーザー機能
    Route::get('/user/top', 'UserController@top');                                         //一般ユーザーTOP画面
    Route::get('/user/enquete/index', 'QuestionController@questionIndex');                 //アンケート回答画面
    Route::post('/user/enquete/confirmation', 'QuestionController@questionConfirmation');  //アンケート回答確認画面
    Route::post('/user/enquete/complete', 'UserController@complete');                      //完了画面
    Route::get('/user/enquete/complete', 'QuestionController@complete');                   //完了画面
    Route::group(['middleware' => ['auth', 'web']], function () {
        Route::get('/user/enquete/changePass', 'UserController@editPassword')->name('user.password.edit');
        Route::post('/user/password/', 'UserController@updatePassword')->name('user.password.update');
    });

    // 管理者機能
    Route::get('/admin/top', 'AdminController@top');                                       // TOP画面
    Route::get('/admin/account/list', 'AdminController@accountList');                      // アカウント一覧
    Route::get('/admin/account/edit/{id}', 'AdminController@accountEdit');                 // アカウント編集
    Route::patch('/admin/account/edit/{id}', 'AdminController@accountUpdate');             // アカウント更新
    Route::delete('/admin/account/list/{user}', 'AdminController@accountDestroy');         // アカウント削除

    Route::get('/admin/enquete/questionComplete', 'AdminController@editQuestionDo');
    Route::get('/admin/enquete/editQuestion/{makeDate}/{id}', 'AdminController@editQuestion');             // アンケート編集 
    Route::get('/admin/enquete/edit', 'AdminController@enqueteEdit');                      // アンケート編集
    Route::patch('/admin/enquete/edit','AdminController@enqueteUpdate');                   // アンケート更新
    Route::get('/admin/enquete/questionList', 'AdminController@enqueteList');              // アンケート一覧(出題日ごと)
    Route::get('/admin/enquete/makeList/{makeDate}', 'AdminController@makeList');          // 作成済みアンケート一覧
    Route::delete('/admin/enquete/questionList/{question}', 'AdminController@destroyGroupQuestion');  // 質問集合体削除
    Route::delete('/admin/enquete/makeList/{question_group}/{id}', 'AdminController@destroyQuestion');  // 質問単体を削除

    Route::get('/admin/account/deleteList', 'AdminController@accountDeleteList');
    Route::get('/admin/answered/list', 'AdminController@answeredList');                    // アンケート回答者一覧
    Route::get('/admin/answered/date/{id}', 'AdminController@answeredDate');               // アンケート回答者日付一覧
    Route::get('/admin/answered/show/{question_id}/{id}', 'AdminController@answeredShow'); // アンケート回答内容確認

});
Auth::routes();
