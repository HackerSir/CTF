@extends('app')

@section('title', "{$user->name} - 編輯會員資料")

@section('content')
    <div class="ui container">
        {{-- TODO: 麵包屑抽出來（建議）--}}
        <div class="ui grey message">
            <div class="ui breadcrumb">
                <div class="section">現在位置：</div>
                <a class="section">{{ link_to_route('user.index', '會員清單') }}</a>
                <i class="right arrow icon divider"></i>
                <div class="active section">會員資料</div>
                <i class="right arrow icon divider"></i>
                <div class="active section">{{ link_to_route('user.show', $user->name, $user) }}</div>
                <i class="right arrow icon divider"></i>
                <div class="active section">編輯會員資料</div>
            </div>
        </div>
        <div class="ui top attached segment">
            <div class="ui top attached label">{{ $user->name }} - 編輯會員資料</div>
            <div class="ui large aligned center aligned relaxed stackable grid">
                <div class="ten wide column">
                    <h2 class="ui teal image header">
                        {{ $user->name }} - 編輯會員資料
                    </h2>
                    {!! SemanticForm::open()->put()->action(route('user.update', $user))->addClass('large') !!}
                    {!! SemanticForm::bind($user) !!}
                    <div class="ui stacked segment">
                        {!! SemanticForm::text('email')->label('Email')->placeholder('Email')->disable() !!}
                        <div class="ui tiny negative message">
                            <ul class="list">
                                <li>信箱作為帳號使用，故無法修改</li>
                            </ul>
                        </div>
                        {!! SemanticForm::text('name')->label('Name')->placeholder('Name / Nickname')->required() !!}
                        <div class="field{{ ($errors->has('role'))?' error':'' }}">
                            <label>角色</label>
                            @foreach($roles as $role)
                                <div class="ui checkbox">
                                    @if($user->id == Auth::user()->id && $role->name == 'admin')
                                        {!! Form::checkbox('role[]', $role->id, $user->hasRole($role->name), ['disabled']) !!}
                                        <label>{{ $role->display_name }} </label>
                                        <span class="label label-primary">禁止解除自己的管理員職務</span>
                                    @else
                                        {!! Form::checkbox('role[]', $role->id, $user->hasRole($role->name)) !!}
                                        <label>{{ $role->display_name }} </label>
                                    @endif
                                </div>
                                <br/>
                            @endforeach
                        </div>
                        <a href="{{ route('user.show', $user) }}" class="ui button"><i class="icon arrow left"></i>
                            返回會員資料</a>
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
