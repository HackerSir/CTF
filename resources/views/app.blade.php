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
        <style>
            .masthead .logo.item img {
                margin-right: 1em;
            }
            .masthead .ui.menu .ui.button {
                margin-left: 0.5em;
            }
            .masthead h1.ui.header {
                margin-top: 3em;
                margin-bottom: 0em;
                font-size: 4em;
                font-weight: normal;
            }
            .masthead h2 {
                font-size: 1.7em;
                font-weight: normal;
            }

            .secondary.pointing.menu {
                border: none !important;
            }

            .secondary.pointing.menu .toc.item {
                display: none;
            }

            @media only screen and (max-width: 700px) {
                .ui.fixed.menu {
                    display: none !important;
                }
                .secondary.pointing.menu .item,
                .secondary.pointing.menu .menu {
                    display: none;
                }
                .secondary.pointing.menu .toc.item {
                    display: block;
                }
            }
        </style>
    </head>
    <body style="margin-top: 50px; background-color: rgba(0,0,0,0) !important;">
        {{-- Navbar --}}
        <div class="ui large center aligned fixed secondary pointing menu transition" style="z-index: 3;" id="navbar">
            <a class="toc item inverted">
                <i class="sidebar icon"></i>
            </a>
            <a class="item" href="{!! route('index') !!}" id="index_item">首頁</a>
            <a class="item" href="{!! route('topic.index') !!}" id="topic_item">題目</a>
            <a class="item" href="{!! route('about') !!}"  id="about_item">關於</a>
            <div class="right menu">
                <div class="item">
                    <a class="ui button" href="{!! route('login') !!}">登入/註冊</a>
                </div>
            </div>
        </div>
        <div class="ui sidebar inverted vertical labeled icon menu" style="z-index: 2;">
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
        </div>

        {{-- Content --}}
        <div class="pusher" style="background-color: rgba(0, 0, 0, 0) !important;">
            {{--<div class="ui vertical masthead center inverted  segment" style="background-color: rgba(0, 0, 0, 0) !important;">--}}
                {{--<div class="ui container">--}}
                    {{--<div class="ui large  inverted pointing menu">--}}
                        {{--<a class="toc item">--}}
                            {{--<i class="sidebar icon"></i>--}}
                        {{--</a>--}}
                        {{--<a class="active item" href="{!! route('index') !!}">首頁</a>--}}
                        {{--<a class="item" href="{!! route('topic.index') !!}">題目</a>--}}
                        {{--<a class="item" href="{!! route('about') !!}">關於</a>--}}
                        {{--<div class="right item">--}}
                            {{--<a class="ui button inverted" href="{!! route('login') !!}">登入/註冊</a>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
            @yield('content')
            {{-- Footer --}}
            <div class="ui footer" id="footer">
                <div class="ui container center aligned">
                    <p>Copyright (c) 2016 HackerSir, All rights reserved.</p>
                </div>
            </div>
        </div>

        {{-- Javascript --}}
        {!! Html::script('//code.jquery.com/jquery-3.0.0.min.js') !!}
        {!! Html::script('semantic/semantic.js') !!}
        {!! Html::script('semantic/components/sidebar.js') !!}
        {!! Html::script('semantic/components/visibility.js') !!}
        @yield('js')
        <script>
            $(document).ready(function(){
                // fix menu when passed
                $('.masthead').visibility({
                    once: false,
                    onBottomPassed: function() {
                        $('.fixed.menu').transition('fade in');
                    },
                    onBottomPassedReverse: function() {
                        $('.fixed.menu').transition('fade out');
                    }
                });

                $('.ui.sidebar').sidebar('attach events', '.toc.item');
            });
        </script>
    </body>
</html>