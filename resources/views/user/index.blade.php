@extends('app')

@section('title', '會員清單')

@section('content')
    <div class="ui container">
        <h2 class="ui teal header center aligned">
            會員清單
        </h2>
        {{-- TODO: 麵包屑抽出來（建議）--}}
        <div class="ui grey message">
            <div class="ui breadcrumb">
                <div class="section">現在位置：</div>
                <div class="active section">會員清單</div>
            </div>
        </div>
        <table class="ui selectable celled padded table">
            <thead>
            <tr>
                <th>使用者</th>
                <th>信箱</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>
                        <h4 class="ui image header">
                            {{ Html::image(Gravatar::src($user->email, 80), null, ['class'=>'ui tiny avatar image']) }}
                            <div class="content">
                                {{ link_to_route('user.show', $user->name, $user, ['class' => 'ui large blue header']) }}
                                <div class="sub header">
                                    @foreach($user->roles as $role)
                                        <span class="ui tag label">{{ $role->display_name }}</span>
                                    @endforeach
                                </div>
                            </div>
                        </h4>
                    </td>
                    <td>
                        {{ $user->email }}
                        @if (!$user->isConfirmed)
                            <i class="warning sign icon red" title="尚未完成信箱驗證"></i>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('user.show', $user) }}" class="ui icon button" title="會員資料"><i
                                class="user icon"></i></a>
                        <a href="{{ route('user.edit', $user) }}" class="ui icon button blue" title="編輯會員"><i
                                class="edit icon"></i></a>
                        {!! Form::open(['route' => ['user.destroy', $user], 'style' => 'display: inline', 'method' => 'DELETE', 'onSubmit' => "return confirm('確定要刪除此會員嗎？');"]) !!}
                        <button type="submit" class="ui icon button red" title="刪除會員">
                            <i class="trash icon"></i>
                        </button>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div>
            {!! $users->appends(Request::except(['page']))->render() !!}
        </div>
    </div>
@endsection
