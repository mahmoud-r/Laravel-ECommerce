{{--@if ($paginator->hasPages())--}}
{{--    <nav>--}}
{{--        <ul class="pagination">--}}
{{--            --}}{{-- Previous Page Link --}}
{{--            @if ($paginator->onFirstPage())--}}
{{--                <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">--}}
{{--                    <span class="page-link" aria-hidden="true">&lsaquo;</span>--}}
{{--                </li>--}}
{{--            @else--}}
{{--                <li class="page-item">--}}
{{--                    <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>--}}
{{--                </li>--}}
{{--            @endif--}}

{{--             Pagination Elements --}}
{{--            @foreach ($elements as $element)--}}
{{--                 "Three Dots" Separator --}}
{{--                @if (is_string($element))--}}
{{--                    <li class="page-item disabled" aria-disabled="true"><span class="page-link">{{ $element }}</span></li>--}}
{{--                @endif--}}

{{--                --}}{{-- Array Of Links --}}
{{--                @if (is_array($element))--}}
{{--                    @foreach ($element as $page => $url)--}}
{{--                        @if ($page == $paginator->currentPage())--}}
{{--                            <li class="page-item active" aria-current="page"><span class="page-link">{{ $page }}</span></li>--}}
{{--                        @else--}}
{{--                            <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>--}}
{{--                        @endif--}}
{{--                    @endforeach--}}
{{--                @endif--}}
{{--            @endforeach--}}

{{--            --}}{{-- Next Page Link --}}
{{--            @if ($paginator->hasMorePages())--}}
{{--                <li class="page-item">--}}
{{--                    <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>--}}
{{--                </li>--}}
{{--            @else--}}
{{--                <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">--}}
{{--                    <span class="page-link" aria-hidden="true">&rsaquo;</span>--}}
{{--                </li>--}}
{{--            @endif--}}
{{--        </ul>--}}
{{--    </nav>--}}
{{--@endif--}}


@if ($paginator->hasPages())

<nav class="pagination row justify-content-around">
    <div class="col col-xs-12 col-lg-4 col-md-12">

    <span class='showing'>
    Showing {!! $paginator->firstItem()!!}-{!! $paginator->lastItem()!!} of {!! $paginator->total()!!} item(s)
    </span>

    </div>
    <div class="col col-xs-12 col-lg-8 col-md-12">

        <ul class="page-list">
            @if ($paginator->onFirstPage())

                @else
                <li >
                    <a
                        rel="prev"
                        href="{{ $paginator->previousPageUrl() }}"
                        class="previous "
                        aria-label="@lang('pagination.previous')"
                    >
                        Previous
                    </a>
                </li>
                @endif
            {{-- Pagination Elements --}}
            @foreach ($elements as $element)

                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                        <li   aria-disabled="true">
                            ...
                        </li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li  class="current active" aria-disabled="true" >
                                <a
                                    rel="nofollow"
                                    href="{{$url}}"
                                    class="disabled "
                                >
                                    {{ $page }}
                                </a>
                            </li>
                        @else
                            <li >
                                <a
                                    rel="nofollow"
                                    href="{{$url}}"
                                >
                                    {{ $page }}
                                </a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach
            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())

                <li >
                    <a
                        rel="next"
                        href=" {{$paginator->nextPageUrl()}}"
                        class="next "
                        aria-label="@lang('pagination.next')"
                    >
                        Next
                    </a>
                </li>
                 @endif
        </ul>
    </div>
</nav>
@endif
