<!DOCTYPE html>
<html>
    <head>
        {{-- Metatag --}}
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')::HackerSir CTF</title>

        {{-- CSS --}}
        {!! Html::style('semantic/semantic.min.css') !!}
        @yield('css')
    </head>
    <body class="pushable">
        {{-- Navbar --}}
        <div class="ui large top fixed menu transition hidden">
            <div class="ui container">
                <a class="active item">首頁</a>
                <a class="item">題目</a>
                <a class="item">關於</a>
                <div class="right menu">
                    <div class="item">
                        <a class="ui button">Log in</a>
                    </div>
                </div>
            </div>
        </div>

        {{-- Content --}}
        @yield('content')

        {{-- Javascript --}}
        {!! Html::script('//code.jquery.com/jquery-3.0.0.min.js') !!}
        {!! Html::script('semantic/semantic.js') !!}
        @yield('js')
    </body>
</html>