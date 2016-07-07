@foreach($items as $item)
    @if($item->hasChildren())
        {{-- 巢狀次級選單 --}}
        {{-- FIXME: @lm-attrs($item) 無法追加class --}}
        <a @lm-attrs($item) class="ui dropdown item" @lm-endattrs href="{!! $item->url() !!}">
            {!! $item->title !!}
            <i class="dropdown icon"></i>
            <div class="menu">
                @include('navbar.sub-menu', ['items' => $item->children()])
            </div>
        </a>
    @else
        {{-- 一般項目 --}}
        @if($item->link)
            {{-- 超連結 --}}
            {{-- FIXME: active --}}
            <a @lm-attrs($item->link) class="item" @lm-endattrs href="{!! $item->url() !!}">{!! $item->title !!}</a>
        @else
            {{-- 文字 --}}
            {!! $item->title !!}
        @endif
    @endif

    @if($item->divider)
        {{-- TODO: 分隔線 --}}
        {{--<li{!! Lavary\Menu\Builder::attributes($item->divider) !!}></li>--}}
    @endif
@endforeach

{{--
原始的view
        @foreach($items as $item)
            <li@lm-attrs($item) @if($item->hasChildren())class ="dropdown"@endif @lm-endattrs>
            @if($item->link)
                <a@lm-attrs($item->link) @if($item->hasChildren()) class="dropdown-toggle" data-toggle="dropdown" @endif @lm-endattrs href="{!! $item->url() !!}">
            {!! $item->title !!}
            @if($item->hasChildren()) <b class="caret"></b> @endif
            </a>
            @else
                {!! $item->title !!}
            @endif
            @if($item->hasChildren())
                <ul class="dropdown-menu">
                    @include(config('laravel-menu.views.bootstrap-items'),
            array('items' => $item->children()))
                </ul>
                @endif
                </li>
                @if($item->divider)
                    <li{!! Lavary\Menu\Builder::attributes($item->divider) !!}></li>
                @endif
                @endforeach
--}}
