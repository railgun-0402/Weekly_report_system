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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function() {

    Route::get('/', 'TopController@index'); // 管理者とユーザーを権限によって振り分け

    // 一般ユーザー
    Route::get('/user/top', 'UserController@top'); //一般ユーザーTOP画面
    Route::get('/user/account/index', 'UserController@accountIndex'); //アカウント情報画面
    Route::get('/user/account/edit', 'UserController@accountEdit'); //アカウント情報編集画面
    Route::post('/user/account/edit', 'UserController@accountUpdate');
    Route::get('/user/enquete/list', 'QuestionController@questionList'); //アンケート回答一覧
    Route::get('/user/enquete/index', 'QuestionController@questionIndex'); //アンケート回答画面
    Route::post('/user/enquete/confirmation', 'QuestionController@questionConfirmation');//アンケート回答確認画面
    Route::post('/user/enquete/complete', 'UserController@complete'); //完了画面
    Route::get('/user/enquete/complete', 'QuestionController@complete'); //完了画面

    // 管理者機能
    Route::get('/admin/top', 'AdminController@top');                                       // TOP画面
    Route::get('/admin/account/list', 'AdminController@accountList');                      // アカウント一覧
    Route::get('/admin/account/edit/{id}', 'AdminController@accountEdit');                 // アカウント編集
    Route::patch('/admin/account/edit/{id}', 'AdminController@accountUpdate');             // アカウント更新
    Route::get('/admin/account/create', 'AdminController@accountCreate');                  // アカウント新規登録（標準機能）
    Route::delete('/admin/account/list/{user}', 'AdminController@accountDestroy');         // アカウント削除

    Route::get('/admin/enquete/edit2', 'AdminController@enqueteEdit2');            // アンケート編集
    Route::patch('/admin/enquete/edit2','AdminController@enqueteUpdate');                     // アンケート更新

    Route::get('/admin/account/deleteList', 'AdminController@accountDeleteList');

    Route::get('/admin/answered/list', 'AdminController@answeredList');             // アンケート回答者一覧
    Route::get('/admin/answered/date/{id}', 'AdminController@answeredDate');        // アンケート回答者日付一覧
    Route::get('/admin/answered/show/{question_id}/{id}', 'AdminController@answeredShow');             // アンケート回答内容確認

    // Route::get('/admin/enquete/create', 'AdminController@enqueteCreate');          // 出題（予定）アンケート作成画面
    // Route::post('/admin/enquete/create','AdminController@enqueteStore');           // 出題（予定）アンケート作成処理

    // Route::get('/admin/enquete/show/{question_group}', 'AdminController@enqueteShow'); // 出題（予定）アンケート一覧
    // Route::get('/admin/enquete/edit/{id}', 'AdminController@enqueteEdit'); // 出題（予定）アンケート編集
    // Route::patch('/admin/enquete/edit/{id}', 'AdminController@enqueteUpdate'); // 出題（予定）アンケート更新 TODO: 途中
    // Route::delete('/admin/enquete/list/{question}', 'AdminController@enqueteDestroy'); // アカウント削除 TODO: 途中



});
Auth::routes();
