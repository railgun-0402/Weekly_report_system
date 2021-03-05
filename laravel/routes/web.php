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

    // 管理者機能
    Route::get('/admin/top', 'AdminController@top');                                       // TOP画面
    Route::get('/admin/account/list', 'AdminController@accountList');                      // アカウント一覧
    Route::get('/admin/account/edit/{id}', 'AdminController@accountEdit');                 // アカウント編集
    Route::patch('/admin/account/edit/{id}', 'AdminController@accountUpdate');             // アカウント更新
    Route::delete('/admin/account/list/{user}', 'AdminController@accountDestroy');         // アカウント削除
    Route::get('/admin/enquete/edit', 'AdminController@enqueteEdit');                      // アンケート編集
    Route::patch('/admin/enquete/edit','AdminController@enqueteUpdate');                   // アンケート更新
    Route::get('/admin/account/deleteList', 'AdminController@accountDeleteList');
    Route::get('/admin/answered/list', 'AdminController@answeredList');                    // アンケート回答者一覧
    Route::get('/admin/answered/date/{id}', 'AdminController@answeredDate');               // アンケート回答者日付一覧
    Route::get('/admin/answered/show/{question_id}/{id}', 'AdminController@answeredShow'); // アンケート回答内容確認

});
Auth::routes();
