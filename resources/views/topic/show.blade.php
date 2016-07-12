@extends('app')


@section('title', 'a001 - Hello World')

@section('content')
    <div class="ui container">
        <h2 class="ui teal header center aligned">
            a001 - Hello World
        </h2>
        <div class="ui divided grid">
            <div class="row">
                <div class="ten wide column">
                    <h3>分類：MISC</h3>

                </div>
                <div class="ui fitted vertical divider"></div>
                <div class="two wide column">
                    <h3>本題提示：</h3>
                    <ul>
                        <li>沒有提示。</li>
                        <li>沒提示。</li>
                        <li>沒提。</li>
                        <li>沒。</li>
                        <li>。</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="ui horizontal divider">And</div>
        <div class="ui text container" style="text-align: center">
            <h3>Flag</h3>
            <form action="post" class="ui form large">
                <div class="field required">
                    <input type="text" name="name" placeholder="Name / Nickname" required="required">
                </div>
                <button type="submit" class="ui blue inverted submit button">送出</button>
                <a href="javascript:void(0)" class="ui blue inverted icon button " title="編輯題目"><i
                            class="edit icon"></i>編輯題目</a>
            </form>
        </div>
    </div>
@endsection