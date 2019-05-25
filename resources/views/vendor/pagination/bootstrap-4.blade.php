<div class=" d-flex flex-wrap align-items-center">

@if ($paginator->hasPages())
    <div class="pagination" role="navigation">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <a class="prev-arrow" aria-disabled="true" aria-label="">
                <i class="fa fa-long-arrow-left" aria-hidden="true"></i>
            </a>
        @else
                <a class="" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>

        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <a class="dot-dot" aria-disabled="true">{{ $element }}</a>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <a class="active" aria-current="page">{{ $page }} </a>
                    @else
               <a class="" href="{{ $url }}">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}

        @if ($paginator->hasMorePages())
                <a class="" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
        @else
            <a class="next-arrow disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
            </a>
        @endif
    </div>
@endif

</div>
