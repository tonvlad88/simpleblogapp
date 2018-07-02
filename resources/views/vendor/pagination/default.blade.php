@if ($paginator->hasPages())
    <ul class="pagination justify-content-center" role="navigation">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="paginate-number disabled paginate-prev is-disable" style="opacity: 0.5 !important;pointer-events: none !important aria-disabled="true" aria-label="@lang('pagination.previous')">
                <!-- <span aria-hiddn="true" class="">&lsaquo;</span> -->
                <span class="paginate-prev-arrow"></span>
            </li>
        @else
            <li class="paginate-number paginate-prev">
                <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')"><span class="paginate-prev-arrow"></span></a>
            </li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="disabled is-disable" aria-disabled="true"><span>{{ $element }}</span></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="active paginate-number is-current" style="pointer-events: none;background-color: #fff;color: #333;border: 2px solid #333;padding-top: 3px;" aria-current="page"><span>{{ $page }}</span></li>
                    @else
                        <li class="paginate-number"><a href="{{ $url }}" style="color:#fff !important">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="paginate-number paginate-next">
                <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')"><span class="paginate-next-arrow"></span></a>
            </li>
        @else
            <li class="disabled paginate-number paginate-next is-disable " style="opacity: 0.5 !important;pointer-events: none !important;" aria-disabled="true" aria-label="@lang('pagination.next')">
                <!-- <span aria-hidden="true">&rsaquo;</span> -->
                <span class="paginate-next-arrow"></span>
            </li>
        @endif
    </ul>
@endif
