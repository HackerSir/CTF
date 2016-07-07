@foreach($items as $item)
        <div class="item">{!! $item->title !!}</div>
        {{--@if($item->hasChildren())--}}
            {{-- TODO: 更深的巢狀 --}}
        {{--@else--}}
            {{--@if($item->link)--}}
                {{--<a@lm-attrs($item->link) class="item" @lm-endattrs href="{!! $item->url() !!}">{!! $item->title !!}</a>--}}
            {{--@else--}}
                {{--{!! $item->title !!}--}}
            {{--@endif--}}
        {{--@endif--}}

        {{--@if($item->divider)--}}
            {{-- TODO: 分隔線 --}}
            {{--<li{!! Lavary\Menu\Builder::attributes($item->divider) !!}></li>--}}
        {{--@endif--}}
@endforeach
