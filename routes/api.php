<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('/article', 'ArticleController');
Route::apiResource('/category', 'CategoryController');


Route::middleware(['middleware' => 'api'])->group(function () {
    # 投稿作成
    //Route::post('/article/upload', 'ArticleController@upload');
    # 投稿一覧表示
    Route::get('/category', 'CategoryController@index');
    # 投稿表示
    Route::get('/category/{id}', 'CategoryController@show');
    # 投稿編集
   // Route::patch('/posts/update/{id}' , 'PostController@update');
    # 投稿削除
   // Route::delete('/posts/{id}', 'PostController@delete');
});