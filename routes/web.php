<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailTest;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/mail', function () {
    $mail_text = "メールテストで使いたい文章";
    Mail::to('to_address@example.com')->send(new MailTest($mail_text));
});

Route::group(['prefix' => 'boot_template'], function () {
    Route::get('list', 'App\Http\Controllers\CrudController@getIndex');    // 一覧表示画面
    Route::get('new', 'App\Http\Controllers\CrudController@new_index');    // 新規登録入力
    Route::patch('new','App\Http\Controllers\CrudController@new_confirm'); // 新規登録確認
    Route::post('new', 'App\Http\Controllers\CrudController@new_finish');  // 新規登録完了

    Route::get('edit/{id}', 'App\Http\Controllers\CrudController@edit_index'); //生徒情報編集
    Route::patch('edit/{id}','App\Http\Controllers\CrudController@edit_confirm'); // 生徒情報編集確認
    Route::post('edit/{id}', 'App\Http\Controllers\CrudController@edit_finish');  // 生徒情報編集完了

    Route::get('detail/{id}', 'App\Http\Controllers\CrudController@detail_index'); // 生徒情報詳細表示

    Route::post('delete/{id}', 'App\Http\Controllers\CrudController@us_delete')->name('delete');//生徒情報削除
    
});



