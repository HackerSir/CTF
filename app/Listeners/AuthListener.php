<?php

namespace App\Listeners;

use Carbon\Carbon;
use Hackersir\User;
use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Logout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class AuthListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * 註冊監聽器的訂閱者。
     *
     * @param  \Illuminate\Events\Dispatcher $events
     */
    public function subscribe($events)
    {
        $events->listen(
            'Illuminate\Auth\Events\Login',
            'App\Listeners\AuthListener@onLogin'
        );

        $events->listen(
            'Illuminate\Auth\Events\Logout',
            'App\Listeners\AuthListener@onLogout'
        );
    }

    /**
     * 使用者登入
     *
     * @param Login $event
     */
    public function onLogin(Login $event)
    {
        /** @var User $user */
        $user = Auth::user();
        $ip = Request::ip();
        //更新資料
        $user->last_login_at = Carbon::now();
        $user->last_login_ip = $ip;
        $user->save();

        //TODO: 寫入紀錄
    }

    /**
     * 使用者登出
     *
     * @param Logout $event
     */
    public function onLogout(Logout $event)
    {
        //TODO: 寫入紀錄
    }
}
