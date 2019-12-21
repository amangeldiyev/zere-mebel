@if ($paginator->hasPages())
    <ul class="shop2-pagelist">
        {{-- Previous Page Link --}}
        @if (!$paginator->onFirstPage())
            <li class="page-first"><a href="{{ $paginator->url(1) }}" rel="prev">&nbsp;</a></li>
            <li class="page-prev"><a href="{{ $paginator->previousPageUrl() }}" rel="prev">&nbsp;</a></li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="page-num active-num"><span>{{$page}}</span></li>
                    @else
                        <li class="page-num"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="page-next"><a href="{{ $paginator->nextPageUrl() }}" rel="next">&nbsp;</a></li>
            <li class="page-last"><a href="{{ $paginator->url($paginator->lastPage()) }}" rel="next">&nbsp;</a></li>
        @endif
    </ul>
@endif