{{-- TODO: 改由LaravelMenu或其他套件自動生成 --}}
<div class="ui large center aligned fixed secondary pointing menu transition" style="z-index: 3;" id="navbar">
    <a class="toc item inverted">
        <i class="sidebar icon"></i>
    </a>
    @include('navbar.item', ['items' => Menu::get('left')->roots()])
    <div class="right menu">
        @include('navbar.item', ['items' => Menu::get('right')->roots()])
    </div>
</div>
<div class="ui sidebar inverted vertical labeled icon menu" style="z-index: 2;">
    {{-- FIXME: 改由LaravelMenu生成 --}}
    <a class="item" href="{!! route('index') !!}">
        <i class="home icon"></i>
        首頁
    </a>
    <a class="item" href="{!! route('topic.index') !!}">
        <i class="book icon"></i>
        題目
    </a>
    <a class="item" href="{!! route('about') !!}">
        <i class="info icon"></i>
        關於
    </a>
    @if(Auth::check())
        @if(!Auth::user()->isConfirmed)
            <a class="item" href="{!! route('auth.resend-confirm-mail') !!}">
                <i class="mail icon red"></i> 信箱未驗證
            </a>
        @endif
        <a class="item" href="{!! action('Auth\AuthController@logout') !!}">
            <i class="spy icon"></i>
            登出
        </a>
    @else
        <a class="item" href="{!! action('Auth\AuthController@showLoginForm') !!}">
            <i class="spy icon"></i>
            登入/註冊
        </a>
    @endif
</div>
