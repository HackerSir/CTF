@extends('app')

@section('css')
    <style>
        #header {
            min-height: 100vh !important;
            background-color: rgba(0, 0, 0, 0);
        }
        #bg {
            position: fixed;
            z-index: 1;
            width: 100%;
            min-height: 100vh !important;
            min-width: 100vh !important;
        }

        .background img, .background video{
            min-height:100vh;
            min-width:100%;
        }
        .second.layout{
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

    <div class="ui text masthead inverted center aligned container second layout">
        <h1 class="ui inverted header">HackerSir CTF</h1>
        <h2 class="ui white">Wanna try your hacker skill? Just try it.</h2>
        <div class="ui huge primary button">Try It!<i class="right arrow icon"></i></div>
    </div>

    <div class="ui vertical footer second layout" id="footer">
        <div class="ui container center aligned">
            <p class="white">Copyright (c) 2016 HackerSir, All rights reserved.</p>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $('#navbar').addClass('inverted fixed');
            $('body').removeAttr('style');
            $('#index_item').addClass('active');
            // create sidebar and attach to menu open
        });
    </script>
@endsection
