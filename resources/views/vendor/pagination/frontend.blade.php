@if ($paginator->hasPages())
    <nav class="d-flex mt-13 pt-3 justify-content-center" aria-label="pagination" data-animate="fadeInUp" >
        <ul class="pagination m-0">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled">
                    <a class="page-link rounded-circle d-flex align-items-center justify-content-center disabled" aria-disabled="true" href="#" aria-label="Previous">
                        <i class="fa fa-arrow-left"></i>
                    </a>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link rounded-circle d-flex align-items-center justify-content-center" rel="prev" href="{{ $paginator->previousPageUrl() }}" aria-label="Previous">
                        <i class="fa fa-arrow-left"></i>
                    </a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="page-item disabled"><a class="page-link" href="#">{{ $element }}</a></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active" aria-current="page"><a class="page-link" href="#">{{ $page }}</a></li>
                        @else
                            <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="page-link rounded-circle d-flex align-items-center justify-content-center" rel="next" href="{{ $paginator->nextPageUrl() }}" aria-label="Next">
                        <i class="fa fa-arrow-right"></i>
                    </a>
                </li>
            @else
                <li class="page-item disabled">
                    <a class="page-link rounded-circle d-flex align-items-center justify-content-center disabled" aria-disabled="true" href="#" aria-label="Next">
                        <i class="fa fa-arrow-right"></i>
                    </a>
                </li>
            @endif
        </ul>
    </nav>
@endif

