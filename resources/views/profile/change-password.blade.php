@extends('app')

@section('title', '修改密碼')

@section('content')
    <div class="ui container">
        <div class="ui top attached segment">
            <div class="ui top attached label">修改密碼</div>
            <div class="ui large aligned center aligned relaxed stackable grid">
                <div class="ten wide column">
                    <h2 class="ui teal image header">
                        Change Password
                    </h2>
                    {!! SemanticForm::open()->put()->action(route('profile.update-password'))->addClass('large') !!}
                    <div class="ui stacked segment">
                        {!! SemanticForm::password('password')->label('Password')->placeholder('Password')->required() !!}
                        {!! SemanticForm::password('new_password')->label('New password')->placeholder('New password')->required() !!}
                        {!! SemanticForm::password('new_password_confirmation')->label('New password Confirmation')->placeholder('New password Confirmation')->required() !!}
                        <a href="{{ route('profile') }}" class="ui button"><i class="icon arrow left"></i> 返回個人資料</a>
                        {!! SemanticForm::submit('Update password')->addClass('teal submit') !!}
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
            </div>
        </div>
    </div>
@endsection
