@if ($breadcrumbs)
    <div class="ui container" style="margin-bottom: 10px">
        <div class="ui breadcrumb">
            <div class="section">現在位置：</div>
            @foreach ($breadcrumbs as $breadcrumb)
                @if (!$breadcrumb->last)
                    @if($breadcrumb->url)
                        <a class="section" href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a>
                    @else
                        <div class="section">{{ $breadcrumb->title }}</div>
                    @endif
                    <i class="right arrow icon divider"></i>
                @else
                    <div class="active section">{{ $breadcrumb->title }}</div>
                @endif
            @endforeach
        </div>
    </div>
@endif
