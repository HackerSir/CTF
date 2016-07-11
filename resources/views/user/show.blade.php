@extends('app')

@section('title', "{$user->name} - 會員資料")

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ $user->name }} - 會員資料</div>
                    {{-- Panel body --}}
                    <div class="panel-body">
                        <div class="row">
                            <div class="text-center">
                                {{-- Gravatar大頭貼 --}}
                                <img src="{{ Gravatar::src($user->email, 200) }}" class="img-circle" /><br />
                            </div>
                        </div>
                        <hr />
                        <div class="row">
                            <div class="text-center col-md-10 col-md-offset-1">
                                <table class="table table-hover">
                                    <tr>
                                        <td class="text-right col-md-4">名稱：</td>
                                        <td>{{ $user->name }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-right">Email：</td>
                                        <td>
                                            {{ $user->email }}
                                            @if (!$user->isConfirmed)
                                                <i class="fa fa-exclamation-triangle text-danger" title="尚未完成信箱驗證"></i>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-right">角色：</td>
                                        <td>
                                            @foreach($user->roles as $role)
                                                {{ $role->display_name }}<br />
                                            @endforeach
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <hr />
                        <div class="row">
                            <div class="text-center col-md-10 col-md-offset-1">
                                <table class="table table-hover">
                                    <tr>
                                        <td class="text-right col-md-4">註冊時間：</td>
                                        <td>{{ $user->register_at }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-right">註冊IP：</td>
                                        <td>{{ $user->register_ip }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-right">最後登入時間：</td>
                                        <td>{{ $user->last_login_at }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-right">最後登入IP：</td>
                                        <td>{{ $user->last_login_ip }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <a href="{{ route('user.index') }}" class="btn btn-default"><i class="fa fa-arrow-left"></i> 會員清單</a>
                    <a href="{{ route('user.edit', $user) }}" class="btn btn-primary" title=""><i class="fa fa-pencil"></i> 編輯會員</a>
                    {!! Form::open(['route' => ['user.destroy', $user], 'style' => 'display: inline', 'method' => 'DELETE', 'onSubmit' => "return confirm('確定要刪除此會員嗎？');"]) !!}
                    <button type="submit" class="btn btn-danger">
                        <i class="fa fa-trash"></i> 刪除會員
                    </button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
