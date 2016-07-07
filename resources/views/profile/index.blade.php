@extends('app')

@section('title', '個人資料')

@section('css')
    <style>
        #gravatar {
            border: 3px solid white;
        }
        #gravatar:hover {
            border: 3px dotted black;
        }
    </style>
@endsection

@section('content')
    <div class="ui container">
        <div class="ui top attached segment">
            <div class="ui top attached label">個人資料</div>
            <div class="ui large aligned center aligned relaxed stackable grid">
                <div class="eight wide column">
                    <h2 class="ui teal image header">
                        Profile
                    </h2>
                    <div>
                        {{-- Gravatar大頭貼 --}}
                        <a href="https://zh-tw.gravatar.com/" target="_blank" title="透過Gravatar更換照片">
                            <img src="{{ Gravatar::src($user->email, 200) }}" class="ui centered medium circular image" id="gravatar" /></a><br />
                    </div>

                    <table class="ui selectable table">
                        <tr>
                            <td class="four wide right aligned">名稱：</td>
                            <td>{{ $user->name }}</td>
                        </tr>
                        <tr>
                            <td class="right aligned">Email：</td>
                            <td>{{ $user->email }}</td>
                        </tr>
                        <tr>
                            <td class="right aligned">角色：</td>
                            <td>
                                @foreach($user->roles as $role)
                                    {{ $role->display_name }}<br />
                                @endforeach
                            </td>
                        </tr>
                    </table>

                    <table class="ui selectable table">
                        <tr>
                            <td class="four wide right aligned">註冊時間：</td>
                            <td>{{ $user->register_at }}</td>
                        </tr>
                        <tr>
                            <td class="right aligned">註冊IP：</td>
                            <td>{{ $user->register_ip }}</td>
                        </tr>
                        <tr>
                            <td class="right aligned">最後登入時間：</td>
                            <td>{{ $user->last_login_at }}</td>
                        </tr>
                        <tr>
                            <td class="right aligned">最後登入IP：</td>
                            <td>{{ $user->last_login_ip }}</td>
                        </tr>
                    </table>

                    <div class="text-center">
                        <a href="{{ route('profile.edit') }}" class="ui button"><i class="icon edit"></i> 編輯資料</a>
                        <a href="{{ route('profile.change-password') }}" class="ui button"><i class="icon lock"></i> 修改密碼</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
