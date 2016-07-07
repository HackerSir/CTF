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

Route::get('about', ['as' => 'about', function () {
    return view('about');
}]);

Route::resource('topic', 'TopicController');

Route::get('/', ['as' => 'index', function () {
    return view('index');
}]);

//會員（須完成信箱驗證）
Route::group(['middleware' => 'email'], function () {
    //會員資料
    Route::group(['prefix' => 'profile'], function () {
        //查看會員資料
        Route::get('/', [
            'as'   => 'profile',
            'uses' => 'ProfileController@getProfile'
        ]);
        //編輯會員資料
        Route::get('edit', [
            'as'   => 'profile.edit',
            'uses' => 'ProfileController@getEditProfile'
        ]);
        Route::put('update', [
            'as'   => 'profile.update',
            'uses' => 'ProfileController@updateProfile'
        ]);
        //修改密碼
        Route::get('change-password', [
            'as'   => 'profile.change-password',
            'uses' => 'ProfileController@getChangePassword'
        ]);
        Route::put('update-password', [
            'as'   => 'profile.update-password',
            'uses' => 'ProfileController@updatePassword'
        ]);
    });
});

//會員（無須完成信箱驗證）
Route::group(['middleware' => 'auth'], function () {
    Route::get('resend', [
        'as'   => 'auth.resend-confirm-mail',
        'uses' => 'Auth\AuthController@resendConfirmMailPage'
    ]);
    Route::post('resend', [
        'as'   => 'auth.resend-confirm-mail',
        'uses' => 'Auth\AuthController@resendConfirmMail'
    ]);
});

//會員系統
Route::auth();
//驗證信箱
Route::get('confirm/{confirmCode}', [
    'as'   => 'auth.confirm',
    'uses' => 'Auth\AuthController@emailConfirm'
]);
