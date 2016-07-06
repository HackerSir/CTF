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
    <div class="ui container">
        <div class="ui top attached segment">
            <div class="ui top attached label">登入</div>
            <div class="ui large aligned center aligned relaxed stackable grid">
                <div class="six wide column">
                    <h2 class="ui teal image header">
                        Login
                    </h2>
                    {!! SemanticForm::open()->action(action('Auth\AuthController@login'))->addClass('large') !!}
                    <div class="ui stacked segment">
                        <div class="field{{ $errors->has('email') ? ' error' : '' }}">
                            <div class="ui left icon input">
                                <i class="user icon"></i>
                                {!! SemanticForm::text('email')->placeholder('E-mail address') !!}
                            </div>
                        </div>
                        <div class="field{{ $errors->has('password') ? ' error' : '' }}">
                            <div class="ui left icon input">
                                <i class="lock icon"></i>
                                {!! SemanticForm::password('password')->placeholder('password') !!}
                            </div>
                        </div>
                        {!! SemanticForm::submit('Login')->addClass('fluid large teal submit') !!}
                    </div>

                    @if($errors->count())
                        <div class="ui error message" style="display: block">
                            <ul class="list">
                                @foreach($errors->all('<li>:message</li>') as $error)
                                    {!! $error !!}
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    {!! SemanticForm::close() !!}
                </div>
                <div class="ui vertical divider" style="height: 25% !important;">OR</div>
                <div class="six wide column">
                    <h2>No Account?</h2>
                    <p>You can just {{ link_to_action('Auth\AuthController@showRegistrationForm', 'Sign up') }}!</p>
                    <div class="ui horizontal divider">
                        Or
                    </div>
                    <h2>Forgot Password?</h2>
                    <p>Well, now you can {{ link_to_action('Auth\PasswordController@showResetForm', 'Reset your password') }}.</p>
                </div>
            </div>
        </div>
    </div>
@endsection
