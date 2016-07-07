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
                /*.ui.fixed.menu {*/
                    /*display: none !important;*/
                /*}*/
                .secondary.pointing.menu .item,
                .secondary.pointing.menu .menu {
                    display: none;
                }
                .secondary.pointing.menu .toc.item {
                    display: block;
                }
            }
            #footer {
                position: fixed;
                bottom: 0;
                width: 100%;
                margin-bottom: 10px;
            }
        </style>
    </head>
    <body style="margin-top: 50px; background-color: rgba(0,0,0,0) !important;">
        {{-- Navbar --}}
        @include('navbar')

        {{-- Content --}}
        <div class="pusher" style="background-color: rgba(0, 0, 0, 0) !important;">
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
                $('.toc.item').click(function (){
                    $('i.sidebar.icon').transition('fade out');
                });
                $('div.pusher').click(function (){
                    $('i.sidebar.icon').transition('fade in');
                });


                $('.ui.sidebar').sidebar('attach events', '.toc.item');
            });
        </script>
    </body>
</html>
