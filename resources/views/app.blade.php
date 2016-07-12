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
        {{-- AlertifyJS --}}
        {!! Html::style('//cdn.jsdelivr.net/alertifyjs/1.7.1/css/alertify.min.css') !!}
        {!! Html::style('//cdn.jsdelivr.net/alertifyjs/1.7.1/css/themes/semantic.min.css') !!}
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

        </style>
        @yield('css')
    </head>
    <body style="background-color: rgba(0,0,0,0) !important;">
        {{-- Navbar --}}
        @include('navbar.navbar')
        {{-- Content --}}
        <div class="pusher" style="background-color: rgba(0, 0, 0, 0) !important;">
            {{-- Breadcrumbs --}}
            @if(!Request::is('/'))
                {!! Breadcrumbs::render() !!}
            @endif
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
        {{-- AlertifyJS --}}
        {!! Html::script('//cdn.jsdelivr.net/alertifyjs/1.7.1/alertify.min.js') !!}
        @yield('js')
        <script>
            $(document).ready(function () {
                $('.toc.item').click(function () {
                    $('i.sidebar.icon').transition('fade out');
                });
                $('div.pusher').click(function () {
                    $('i.sidebar.icon').transition('fade in');
                });


                $('.ui.sidebar').sidebar('attach events', '.toc.item');
//                $('.ui.dropdown').dropdown();
                $('.ui.dropdown').each(function () {
                    $(this).dropdown();
                });


                {{-- AlertifyJS --}}
                    alertify.defaults = {
                    notifier: {
                        position: 'top-right'
                    }
                };
                @if(Session::has('global'))
                    alertify.success('{{ Session::get('global') }}');
                @endif
                @if(Session::has('warning'))
                    alertify.error('{{ Session::get('warning') }}');
                @endif
            });
        </script>
    </body>
</html>
