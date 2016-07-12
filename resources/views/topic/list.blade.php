@extends('app')

@section('title', '題目清單')

@section('css')
    <style>
        table {
            border: none !important;
        }
    </style>
@endsection

@section('content')
    <div class="ui container">
        <h2 class="ui teal header center aligned">
            題目清單
        </h2>
        <table class="ui very basic selectable celled table">
            <thead>
                <tr>
                    <th class="one wide">序號</th>
                    <th class="one wide">分類</th>
                    <th class="one wide">題號</th>
                    <th class="six wide">題目名稱</th>
                    <th class="one wide">通過率</th>
                    <th class="three wide">加入時間</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Misc</td>
                    <td>a001</td>
                    <td>Hello World</td>
                    <td>100%</td>
                    <td>2038/01/19</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Web</td>
                    <td>b001</td>
                    <td>Hello Internet</td>
                    <td>99%</td>
                    <td>2038/01/19</td>
                </tr>
            </tbody>
        </table>
        <div style="text-align: center;">
            {{--{!! $users->appends(Request::except(['page']))->render() !!}--}}
            <a href="{{ route('topic.index') }}" class="ui blue inverted icon button"><i class="arrow left icon"></i>
                題目分類</a>
        </div>
    </div>
@endsection