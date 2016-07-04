@extends('app')

@section('css')
    <style>
        .masthead.segment {
            min-height: 700px;
            padding: 1em 0em;
        }
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
            .masthead.segment {
                min-height: 350px;
            }
            .masthead h1.ui.header {
                font-size: 2em;
                margin-top: 1.5em;
            }
            .masthead h2 {
                margin-top: 0.5em;
                font-size: 1.5em;
            }
        }
        #header {
            min-height: 100vh !important;
            background-color: rgba(0, 0, 0, 0);
        }
        #bg {
            position: fixed;
            z-index: 1;
            width: 100%;
            min-height: 100vh !important;
        }
        #footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            margin-bottom: 10px;
        }
        .background img, .background video{
            min-height:100vh;
            min-width:100%;
        }
        .frame.curtain{
            position: relative;
            z-index: 2;
        }
        .white {
            color: #ffffff;
        }
    </style>
@endsection

@section('title', '首頁')

@section('content')
    <div class="background frame" id="bg">
        <video autoplay loop muted>
            <source src="//i.imgur.com/2r5Ldv5.mp4" type="video/mp4">
        </video>
    </div>
    <div class="pusher frame curtain" id="header">
        <div class="ui vertical masthead center aligned segment">
            <div class="ui container">
                <div class="ui large secondary inverted pointing menu">
                    <a class="toc item">
                        <i class="sidebar icon"></i>
                    </a>
                    <a class="active item" href="{!! route('index') !!}">首頁</a>
                    <a class="item" href="{!! route('topic.index') !!}">題目</a>
                    <a class="item" href="{!! route('about') !!}">關於</a>
                    <div class="right item">
                        <a class="ui button inverted" href="{!! route('login') !!}">登入/註冊</a>
                    </div>
                </div>
            </div>

            <div class="ui text container">
                <h1 class="ui inverted header">
                    HackerSir CTF
                </h1>
                <h2 class="ui white">Wanna try your hacker skill? Just try it.</h2>
                <div class="ui huge primary button">Try It!<i class="right arrow icon"></i></div>
            </div>

            <div class="ui vertical footer" id="footer">
                <div class="ui container center aligned">
                    <p class="white">Copyright (c) 2016 HackerSir, All rights reserved.</p>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
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
            // create sidebar and attach to menu open
            $('.ui.labeled.icon.sidebar').sidebar('attach events', '.toc.item');
        });
    </script>
@endsection