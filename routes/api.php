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

Route::group([
    'namespace' => 'App\Http\Controllers\Api'
], function(){
    Route::post('login', 'AuthController@login');
    Route::post('register', 'UserController@store');
    Route::group([
            'middleware' => 'jwt.auth',
        ], function () {
            Route::post('logout', 'AuthController@logout');
            Route::post('refresh', 'AuthController@refresh');
            Route::get('me', 'AuthController@me');
    });
    Route::get('users/diary', 'DiaryController@getDiaryOfUser')->middleware('auth');
    Route::get('diaries', 'DiaryController@getAllPublicDiary');
    Route::get('diaries/{diaryID}', 'DiaryController@getDetailDiary');
    Route::post('diaries', 'DiaryController@createDiary')->middleware('auth');
    Route::put('diaries/{diaryID}', 'DiaryController@update')->middleware('auth');
    Route::delete('diaries', 'DiaryController@delete')->middleware('auth');
    Route::post('comments', 'CommentController@store')->middleware('auth');
    Route::get('comments/{diaryID}', 'CommentController@index');
    Route::get('profile/{profile}', 'UserController@show');
    Route::put('profile/{profile}', 'UserController@update');
});

