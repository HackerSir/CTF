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

Route::get('about', [
    'as' => 'about',
    function () {
        return view('about');
    }
]);

Route::get('/', [
    'as' => 'index',
    function () {
        return view('index');
    }
]);

//會員（須完成信箱驗證）
Route::group(['middleware' => 'email'], function () {
    //會員管理
    //權限：user.manage、user.view
    Route::resource('user', 'UserController', [
        'except' => [
            'create',
            'store'
        ]
    ]);
    //權限清單
    //權限：permission.index.access
    Route::get('permission', [
        'as'         => 'permission.index',
        'uses'       => 'PermissionController@index',
        'middleware' => 'permission:permission.index.access'
    ]);
    //角色管理
    //權限：role.manage
    Route::group(['middleware' => 'permission:role.manage'], function () {
        Route::resource('role', 'RoleController', [
            'except' => [
                'index',
                'show'
            ]
        ]);
    });
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
    });
    //題目系統
    Route::resource('topic', 'TopicController');
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
//麵包屑要求對全部路由命名，因此將 Route::auth() 複製出來自己命名
//Route::auth();
Route::group(['namespace' => 'Auth'], function () {
    // Authentication Routes...
    Route::get('login', 'AuthController@showLoginForm')->name('auth.login');
    Route::post('login', 'AuthController@login')->name('auth.login');
    Route::get('logout', 'AuthController@logout')->name('auth.logout');
    // Registration Routes...
    Route::get('register', 'AuthController@showRegistrationForm')->name('auth.register');
    Route::post('register', 'AuthController@register')->name('auth.register');
    // Password Reset Routes...
    Route::get('password/reset/{token?}', 'PasswordController@showResetForm')->name('auth.password.reset');
    Route::post('password/email', 'PasswordController@sendResetLinkEmail')->name('auth.password.email');
    Route::post('password/reset', 'PasswordController@reset')->name('auth.password.reset');

    //修改密碼
    Route::get('change-password', 'PasswordController@getChangePassword')->name('auth.change-password');
    Route::put('update-password', 'PasswordController@updatePassword')->name('auth.update-password');

    //驗證信箱
    Route::get('confirm/{confirmCode}', 'AuthController@emailConfirm')->name('auth.confirm');
});
