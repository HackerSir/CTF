<?php

namespace App\Http\Middleware;

use Closure;
use Entrust;
use Illuminate\Support\Facades\Auth;
use Menu;
use Thomaswelton\LaravelGravatar\Facades\Gravatar;

class LaravelMenu
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //左側
        Menu::make('left', function ($menu) {
            $menu->add('首頁', ['route' => 'index']);
            $menu->add('題目', ['route' => 'topic.index'])->active('topic/*');
            $menu->add('關於', ['route' => 'about']);
        });
        //右側
        Menu::make('right', function ($menu) {
            //會員
            if (Auth::check()) {
                if (!Auth::user()->isConfirmed) {
                    $confirmAlert = $menu->add(
                        '<i class="ui icon alarm red"></i> 尚未完成信箱驗證',
                        ['route' => 'auth.resend-confirm-mail']
                    );
                    //FIXME: 無法追記加class
                    $confirmAlert->attr('class', 'red');
                }
                if (Entrust::can(['user.manage', 'user.view'])) {
                    $menu->add('會員清單', ['route' => 'user.index'])->active('user/*');
                }
                $userMenu = $menu->add(Auth::user()->name, 'javascript:void(0)');
                $userMenu->add('個人資料', ['route' => 'profile'])->active('profile/*');
                $userMenu->add('登出', ['action' => 'Auth\AuthController@logout']);
            } else {
                //遊客
                $menu->add('登入', ['action' => 'Auth\AuthController@showLoginForm']);
            }
        });
        //FIXME
//        Menu::make('navBar', function ($menu) {
//            /** @var \Lavary\Menu\Builder $menu */
//            //基本巡覽列
//
//            //會員
//            if (Auth::check()) {
//                //信箱驗證
//                if (!Auth::user()->isConfirmed) {
//                    $confirmAlert = $menu->add(
//                        '<i class="fa fa-exclamation-triangle"></i> 尚未完成信箱驗證',
//                        ['route' => 'auth.resend-confirm-mail']
//                    );
//                    $confirmAlert->attr('class', 'alert-danger');
//                }
//                //核心功能
//                if (Entrust::can(['unit.view', 'unit.manage'])) {
//                    $menu->add('單位', ['route' => 'unit.index'])->active('unit/*');
//                }
//                if (Entrust::can(['iodef.view', 'iodef.manage'])) {
//                    $menu->add('IODEF', ['route' => 'IODEF.index'])->active('IODEF/*');
//                }
//                if (Entrust::can(['association.view', 'association.manage'])) {
//                    $menu->add('Association', ['route' => 'association.index'])->active('association/*');
//                }
//
//                if (Entrust::hasRole('admin')) {
//                    /** @var \Lavary\Menu\Builder $adminMenu */
//                    $adminMenu = $menu->add('管理員', 'javascript:void(0)');
//                    $adminMenu->add('會員管理', ['route' => 'user.index']);
//                    $adminMenu->add('權限清單', ['route' => 'permission.index']);
//                    $adminMenu->add('網站設定', ['route' => 'setting.index'])->divide();
//                    $adminMenu->add('測試面板', ['route' => 'test.index'])->active('test/*')->divide();
//                    $adminMenu->add(
//                        '記錄檢視器 <i class="fa fa-external-link"></i>',
//                        ['route' => 'log-viewer::dashboard']
//                    )->link->attr('target', '_blank');
//                }
//                //會員
//                /** @var \Lavary\Menu\Builder $userMenu */
//                $userMenu = $menu->add(
//                    '<img src="' . Gravatar::src(Auth::user()->email) . '" class="img-circle" height=40 width=40> '
//                    . Auth::user()->name,
//                    'javascript:void(0)'
//                );
//                $userMenu->link->attr('style', 'padding: 5px 15px 5px 5px');
//                $userMenu->add('個人資料', ['route' => 'profile'])->active('profile/*');
//                $userMenu->add('登出', ['action' => 'Auth\AuthController@logout']);
//            } else {
//                //遊客
//                $menu->add('登入', ['action' => 'Auth\AuthController@showLoginForm']);
//            }
//        });
        return $next($request);
    }
}
