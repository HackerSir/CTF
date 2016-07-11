@extends('app')

@section('title', "{$user->name} - 編輯會員資料")

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                {!! Form::model($user, ['route' => ['user.update', $user], 'method' => 'PUT', 'class' => 'form-horizontal']) !!}
                <div class="panel panel-default">
                    <div class="panel-heading">{{ $user->name }} - 編輯會員資料</div>
                    {{-- Panel body --}}
                    <div class="panel-body">
                        <div class="row">
                            <div class="text-center">
                                {{-- Gravatar大頭貼 --}}
                                <img src="{{ Gravatar::src($user->email, 200) }}" class="img-circle"/><br/>
                            </div>
                        </div>
                        <hr/>
                        <div class="row">
                            <div class="form-group has-feedback{{ ($errors->has('name'))?' has-error':'' }}">
                                <label class="control-label col-md-2" for="name">名稱</label>
                                <div class="col-md-9">
                                    {!! Form::text('name', null, ['placeholder' => '請輸入名稱', 'class' => 'form-control', 'required']) !!}
                                    @if($errors->has('name'))<span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
                                    <span class="label label-danger">{{ $errors->first('name') }}</span><br />@endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2" for="name">Email</label>
                                <div class="col-md-9">
                                    <span class="form-control" readonly>{{ $user->email }}</span>
                                    <span class="label label-primary">信箱作為帳號使用，故無法修改</span>
                                </div>
                            </div>
                            <div class="form-group has-feedback{{ ($errors->has('role'))?' has-error':'' }}">
                                <label class="control-label col-md-2" for="role">角色</label>
                                <div class="col-md-9">
                                    @foreach($roles as $role)
                                        <div class="checkbox">
                                            <label>
                                                @if($user->id == Auth::user()->id && $role->name == 'admin')
                                                    {!! Form::checkbox('role[]', $role->id, $user->hasRole($role->name), ['disabled']) !!} {{ $role->display_name }}
                                                    <span class="label label-primary">禁止解除自己的管理員職務</span>
                                                @else
                                                    {!! Form::checkbox('role[]', $role->id, $user->hasRole($role->name)) !!} {{ $role->display_name }}
                                                @endif
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <a href="{{ route('user.show', $user) }}" class="btn btn-default"><i class="fa fa-arrow-left"></i> 返回會員資料</a>
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-check"></i> 確認
                    </button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
