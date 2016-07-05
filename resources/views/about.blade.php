@extends('app')

@section('title', '關於')

@section('content')
    <div class="ui text center aligned container">
        <h1 class="ui header">關於我們</h1>
        <p>CTF？黑客社？這些都是什麼東東啊？</p>
    </div>
    <div class="ui vertical stripe segment">
        <h2>什麼是CTF？</h2>
    </div>

    <div class="ui vertical stripe segment">
        <h2>什麼是黑客社？</h2>
    </div>

    <div class="ui vertical stripe segment">
        <h2>服務及隱私權政策</h2>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $('#about_item').addClass('active');
        });
    </script>
@endsection
