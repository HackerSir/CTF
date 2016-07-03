<!DOCTYPE html>
<html>
    <head>
        {{-- Metatag --}}
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

        <title>@yield('title')::HackerSir CTF</title>

        {{-- CSS --}}
        {!! Html::style('semantic/semantic.min.css') !!}
        @yield('css')
    </head>
    <body class="pushable">
        {{-- Navbar --}}
        <div class="ui large pointing inverted top menu transition hidden" style="z-index: 2;">
            <a class="item" href="javascript:void(0)">首頁</a>
            <a class="item" href="javascript:void(0)">題目</a>
            <a class="item" href="javascript:void(0)">關於</a>
            <div class="right menu">
                <div class="item">
                    <a class="ui button" href="javascript:void(0)">登入/註冊</a>
                </div>
            </div>
        </div>
        <div class="ui sidebar inverted vertical labeled icon menu" style="z-index: 2;">
            <a class="item" href="javascript:void(0)" style="color: white;">
                <i class="home icon"></i>
                首頁
            </a>
            <a class="item" href="javascript:void(0)">
                <i class="book icon"></i>
                題目
            </a>
            <a class="item" href="javascript:void(0)">
                <i class="info icon"></i>
                關於
            </a>
            <a class="item" href="javascript:void(0)">
                <i class="spy icon"></i>
                登入/註冊
            </a>
        </div>

        {{-- Content --}}
        @yield('content')

        {{-- Javascript --}}
        {!! Html::script('//code.jquery.com/jquery-3.0.0.min.js') !!}
        {!! Html::script('semantic/semantic.js') !!}
        {!! Html::script('semantic/components/sidebar.js') !!}
        {!! Html::script('semantic/components/visibility.js') !!}
        @yield('js')
    </body>
</html>