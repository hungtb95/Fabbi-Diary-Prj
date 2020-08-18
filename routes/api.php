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
Route::get('users/diary', 'Api\DiaryController@getDiaryOfUser')->middleware('auth');
Route::get('diaries', 'Api\DiaryController@getAllPublicDiary');
Route::get('diaries/{diaryID}', 'Api\DiaryController@getDetailDiary');
Route::post('diaries', 'Api\DiaryController@createDiary')->middleware('auth');
Route::put('diaries/{diaryID}', 'Api\DiaryController@update')->middleware('auth');
