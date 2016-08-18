<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::auth();

Route::get('/', 'HomeController@index');
Route::group(['prefix'=>'api'],function(){
    Route::get('check','ApiController@check');
    Route::get('showGames','ApiController@showGames');
});
Route::group(['prefix'=>'/my','middleware'=>'auth'],function (){

    Route::get('/{id}','GameController@index');
//    Route::get('{id}/game/{id}','GameController@index');
    Route::get('{user_id}/game/{id}','GameController@showEditGame');
    Route::post('game','GameController@create');
    Route::patch('game/{id}','GameController@update');
    Route::delete('game/{id}','GameController@delete');
});