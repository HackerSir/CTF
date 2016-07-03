@extends('app')

@section('title', '關於')

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
    <div class="pusher frame curtain" id="header">
        <div class="ui vertical masthead center aligned segment">
            <div class="ui container">
                <div class="ui large secondary pointing menu">
                    <a class="toc item">
                        <i class="sidebar icon"></i>
                    </a>
                    <a class="item" href="{!! route('index') !!}">首頁</a>
                    <a class="item" href="javascript:void(0)">題目</a>
                    <a class="active item" href="{!! route('about') !!}">關於</a>
                    <div class="right item">
                        <a class="ui button" href="javascript:void(0)">登入/註冊</a>
                    </div>
                </div>
                <div class="ui text container">
                    <h1 class="ui header">關於我們</h1>
                    <p>CTF？黑客社？這些都是什麼東東啊？</p>
                </div>
            </div>

            <div class="ui vertical stripe segment">
                <h2>什麼是CTF？</h2>
            </div>

            <div class="ui vertical stripe segment">
                <h2>什麼是黑客社？</h2>
            </div>

            <div class="ui vertical stripe segment">
                <h2>服務及隱私權政策</h2>
            </div>

            <div class="ui vertical footer" id="footer">
                <div class="ui container center aligned">
                    <p>Copyright (c) 2016 HackerSir, All rights reserved.</p>
                </div>
            </div>
        </div>
    </div>
@endsection