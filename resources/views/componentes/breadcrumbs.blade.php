<ol class="breadcrumb">
    @foreach ($links as $label => $url)
        @if ($url == '')
            <li class="active">{!! $label !!}</li>
        @else
            @if (is_array($url))
                <li><a href="{{ route($url[0], [ $url[1] ]) }}">{!! $label !!}</a></li>
            @else
                <li><a href="{{ route($url) }}">{!! $label !!}</a></li>
            @endif
        @endif
    @endforeach
</ol>