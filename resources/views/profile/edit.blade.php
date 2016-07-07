@extends('app')

@section('title', '編輯個人資料')

@section('content')
    <div class="ui container">
        <div class="ui top attached segment">
            <div class="ui top attached label">編輯個人資料</div>
            <div class="ui large aligned center aligned relaxed stackable grid">
                <div class="ten wide column">
                    <h2 class="ui teal image header">
                        Edit profile
                    </h2>
                    {!! SemanticForm::open()->put()->action(route('profile.update'))->addClass('large') !!}
                    {!! SemanticForm::bind($user) !!}
                    <div class="ui stacked segment">
                        {!! SemanticForm::text('email')->label('Email')->placeholder('Email')->disable() !!}
                        <div class="ui tiny negative message">
                            <ul class="list">
                                <li>信箱作為帳號使用，故無法修改</li>
                            </ul>
                        </div>
                        {!! SemanticForm::text('name')->label('Name')->placeholder('Name / Nickname')->required() !!}
                        <a href="{{ route('profile') }}" class="ui button"><i class="icon arrow left"></i> 返回個人資料</a>
                        {!! SemanticForm::submit('Update profile')->addClass('teal submit') !!}
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
