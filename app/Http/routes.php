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
Route::get('/game/{id}','PlayController@index');
Route::group(['prefix'=>'api'],function(){
    Route::get('check','ApiController@check');
    /*Route::get('showGames','ApiController@showGames');*/
    Route::get('config/{game_id}','ApiController@showConfig');
    Route::get('comments/{game_id}','ApiController@showComment');
    Route::post('comments/{game_id}','ApiController@storeComment');
});
Route::group(['prefix'=>'/my','middleware'=>'auth'],function (){

    Route::get('/{id}','GameController@index');
//    Route::get('{id}/game/{id}','GameController@index');
    Route::get('/{id}/template','TemplateController@index');
    Route::get('/{user_id}/game/{id}','GameController@showEditGame');
    Route::get('/template/{id}/addGame','GameController@showAddGame');
    Route::post('template/{id}/addGame','GameController@storeGame');

//    Route::post('{id}/upload','GameController@uploadGame');
    /*Route::post('/game','GameController@create');
    Route::patch('/game/{id}','GameController@update');
    Route::delete('/game/{id}','GameController@delete');*/
});