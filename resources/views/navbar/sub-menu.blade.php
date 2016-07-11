@foreach($items as $item)
        {{--<div class="item">{!! $item->title !!}</div>--}}
        @if($item->hasChildren())
             {{-- 更深的巢狀 --}}
             <div @lm-attrs($item) class="ui dropdown item" @lm-endattrs href="{!! $item->url() !!}">
                 {!! $item->title !!}
                 <i class="dropdown icon"></i>
                 <div class="menu">
                     @include('navbar.sub-menu', ['items' => $item->children()])
                 </div>
             </div>
        @else
            @if($item->link)
                <a@lm-attrs($item->link) class="item" @lm-endattrs href="{!! $item->url() !!}">{!! $item->title !!}</a>
            @else
                <div class="item">{!! $item->title !!}</div>
            @endif
        @endif

        @if($item->divider)
             {{-- 分隔線 --}}
            <div{!! Lavary\Menu\Builder::attributes($item->divider) !!}></div>
        @endif
@endforeach
