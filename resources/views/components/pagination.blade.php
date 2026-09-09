<link rel="stylesheet" href="{{ asset('css/app.css') }}">
@if ($paginator->hasPages())
    

    <nav aria-label="Pagination Navigation" class="pagination-wrapper">
        <ul class="pagination-list">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="pagination-item pagination-disabled">
                    <span class="pagination-btn">← Previous</span>
                </li>
            @else
                <li class="pagination-item">
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="pagination-btn">← Previous</a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="pagination-item pagination-disabled">
                        <span class="pagination-btn">...</span>
                    </li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="pagination-item pagination-active">
                                <span class="pagination-number" aria-current="page">{{ $page }}</span>
                            </li>
                        @else
                            <li class="pagination-item">
                                <a href="{{ $url }}" class="pagination-number">{{ $page }}</a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="pagination-item">
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="pagination-btn">Next →</a>
                </li>
            @else
                <li class="pagination-item pagination-disabled">
                    <span class="pagination-btn">Next →</span>
                </li>
            @endif
        </ul>
    </nav>
@endif
