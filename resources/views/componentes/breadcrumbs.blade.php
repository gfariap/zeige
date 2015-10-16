<ol class="breadcrumb">
    @foreach ($links as $label => $url)
        @if ($url == '')
            <li class="active">{!! $label !!}</li>
        @else
            <li><a href="{{ route($url) }}">{!! $label !!}</a></li>
        @endif
    @endforeach
</ol>