@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="flex justify-between">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <span class="relative block px-2 py-2 bg-gray-300 text-gray-700 text-sm rounded-l-md">Previous</span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}"
               rel="prev"
               class="relative block px-2 py-2 bg-gray-300 text-gray-700 text-sm rounded-l-md hover:text-white hover:bg-blue-500"
            >
                Previous
            </a>
        @endif

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}"
               rel="next"
               class="relative block px-2 py-2 bg-gray-300 text-gray-700 text-sm rounded-r-md hover:text-white hover:bg-blue-500"
            >
                Next
            </a>
        @else
            <span class="relative block px-2 py-2 bg-gray-300 text-gray-700 text-sm rounded-r-md">Next</span>
        @endif
    </nav>
@endif
