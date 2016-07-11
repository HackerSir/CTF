@extends('app')

@section('title', '會員清單')

@section('css')
    <style type="text/css">
        {{-- 使表格文字垂直置中 --}}
        .table > tbody > tr > td {
            vertical-align: middle;
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <div class="page-header">
            <h1>會員清單</h1>
        </div>
        <table class="table table-bordered table-hover table-striped">
            <thead>
            <tr>
                <th>名稱</th>
                <th>信箱</th>
                <th>角色</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>
                        {{ Html::image(Gravatar::src($user->email), null, ['class'=>'img-circle', 'height'=>'40px', 'width'=>'40px']) }}
                        {{ link_to_route('user.show', $user->name, $user) }}
                    </td>
                    <td>
                        {{ $user->email }}
                        @if (!$user->isConfirmed)
                            <i class="fa fa-exclamation-triangle text-danger" title="尚未完成信箱驗證"></i>
                        @endif
                    </td>
                    <td>
                        @foreach($user->roles as $role)
                            {{ $role->display_name }}<br/>
                        @endforeach
                    </td>
                    <td>
                        <a href="{{ route('user.show', $user) }}" class="btn btn-xs btn-default" title="會員資料"><i class="fa fa-search fa-fw"></i></a>
                        <a href="{{ route('user.edit', $user) }}" class="btn btn-xs btn-primary" title="編輯會員"><i class="fa fa-pencil fa-fw"></i></a>
                        {!! Form::open(['route' => ['user.destroy', $user], 'style' => 'display: inline', 'method' => 'DELETE', 'onSubmit' => "return confirm('確定要刪除此會員嗎？');"]) !!}
                        <button type="submit" class="btn btn-xs btn-danger" title="刪除會員">
                            <i class="fa fa-trash fa-fw"></i>
                        </button>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="text-center">
            {!! $users->appends(Request::except(['page']))->render() !!}
        </div>
    </div>
@endsection
