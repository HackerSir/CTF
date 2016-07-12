@extends('app')

@php($isEditMode = isset($role))
@php($methodText = $isEditMode ? '編輯' : '新增')

@section('title', $methodText . '角色')

@section('content')
    <div class="ui container">
        <h2 class="ui teal header center aligned">
            {{ $methodText }}角色
        </h2>
        {{-- TODO: 麵包屑抽出來（建議）--}}
        <div class="ui grey message">
            <div class="ui breadcrumb">
                <div class="section">現在位置：</div>
                <a class="section">{{ link_to_route('permission.index', '權限與角色') }}</a>
                <i class="right arrow icon divider"></i>
                <div class="active section">{{ $methodText }}角色</div>
            </div>
        </div>
        @if($isEditMode)
            {!! SemanticForm::open()->action(route('role.update', $role))->put() !!}
            {!! SemanticForm::bind($role) !!}
        @else
            {!! SemanticForm::open()->action(route('role.store')) !!}
        @endif
        <div class="ui stacked segment">
            {!! SemanticForm::text('name')->label('角色英文名稱')->placeholder('如：admin')->required() !!}
            {!! SemanticForm::text('display_name')->label('角色顯示名稱')->placeholder('如：管理員')->required() !!}
            {!! SemanticForm::text('description')->label('角色簡介')->placeholder('說明此角色之用途') !!}
            <div class="field{{ ($errors->has('role'))?' error':'' }}">
                <label>權限</label>
                @foreach($permissions as $permission)
                    <div class="ui checkbox">
                        {{ Form::checkbox('permissions[]', $permission->id, isset($role) && $role->perms->contains($permission), ['id' => $permission->id]) }}
                        <label for="{{ $permission->id }}">
                            {{ $permission->display_name }}（{{ $permission->name }}）<br/>
                            <small><i class="angle double right icon"></i> {{ $permission->description }}</small>
                        </label>
                    </div>
                    <br/>
                    <br/>
                @endforeach
            </div>
            <div style="text-align: center">
                <a href="{{ route('permission.index') }}" class="ui blue inverted icon button"><i class="icon arrow left"></i>
                    返回</a>
                {!! SemanticForm::submit('確認')->addClass('ui red inverted submit button') !!}
            </div>
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
@endsection
