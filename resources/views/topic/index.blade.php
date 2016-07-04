@extends('app')

@section('title', '題目')

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
    </style>
@endsection

@section('content')
    <div class="pusher">
        <div class="ui vertical masthead center aligned segment">
            <div class="ui container">
                <div class="ui large secondary pointing menu">
                    <a class="toc item">
                        <i class="sidebar icon"></i>
                    </a>
                    <a class="item" href="{!! route('index') !!}">首頁</a>
                    <a class="active item" href="{!! route('topic.index') !!}">題目</a>
                    <a class="item" href="{!! route('about') !!}">關於</a>
                    <div class="right item">
                        <a class="ui button" href="{!! route('login') !!}">登入/註冊</a>
                    </div>
                </div>
                <div class="ui text container">
                    <h1 class="ui header">CTF題目</h1>
                    <p>CTF題目</p>
                </div>
            </div>
    </div>
@endsection