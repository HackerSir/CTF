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

Route::get('about', [ 'as' => 'about', function () {
    return view('about');
}]);

Route::resource('topic', 'TopicController');

Route::get('/', [ 'as' => 'index', function () {
    return view('index');
}]);

//會員系統
Route::auth();
//驗證信箱
Route::get('confirm/{confirmCode}', [
    'as'   => 'auth.confirm',
    'uses' => 'Auth\AuthController@emailConfirm'
]);
