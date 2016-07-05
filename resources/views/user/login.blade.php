@extends('app')

@section('title', '登入')

@section('css')
    <style>
        body > .grid {
            height: 100%;
        }
        .image {
            margin-top: -100px;
        }
        .column {
            max-width: 450px;
        }

    </style>
@endsection

@section('content')
    {{-- FIXME: 垂直位置 --}}
    <div class="ui container">
        <div class="ui top attached segment">
            <div class="ui top attached label">登入</div>
            <div class="ui large aligned center aligned relaxed stackable grid">
                <div class="six wide column">
                    <h2 class="ui teal image header">
                        Login
                    </h2>
                    <form class="ui large form">
                        <div class="ui stacked segment">
                            <div class="field">
                                <div class="ui left icon input">
                                    <i class="user icon"></i>
                                    <input type="text" name="email" placeholder="E-mail address">
                                </div>
                            </div>
                            <div class="field">
                                <div class="ui left icon input">
                                    <i class="lock icon"></i>
                                    <input type="password" name="password" placeholder="Password">
                                </div>
                            </div>
                            <div class="ui fluid large teal submit button">Login</div>
                        </div>

                        <div class="ui error message"></div>
                    </form>
                </div>
                <div class="ui vertical divider" style="height: 25% !important;">OR</div>
                <div class="six wide column">
                    <h2>No Account?</h2>
                    <p>You can just Sign up!</p>
                    <div class="ui horizontal divider">
                        Or
                    </div>
                    <h2>Forgot Password?</h2>
                    <p>Well, now you can change your password.</p>
                </div>
            </div>
        </div>
    </div>

@endsection
