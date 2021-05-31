@if ($paginator->hasPages())
    <nav>
        <ul class="cus-pag">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                {{-- <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span aria-hidden="true">&lsaquo;</span>
                </li> --}}
            @else
                <li>
                    <a class="pre-btn" href="{{ $paginator->previousPageUrl() }}"><span class="fas fa-angle-left"></span> Previous</a>
                </li>
            @endif

            {{-- Pagination Elements --}}
                @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="disabled" aria-disabled="true"><span>{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li aria-current="page"><a href="#" class="active">{{ $page }}</a></li>
                        @else
                            <li><a href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach         
           {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li>
                    <a class="next-btn" href="{{ $paginator->nextPageUrl() }}">Next <span class="fas fa-angle-right"></span></a>
                </li>
            @else
                {{-- <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span aria-hidden="true">&rsaquo;</span>
                </li> --}}
            @endif
        </ul>
    </nav>
@endif
