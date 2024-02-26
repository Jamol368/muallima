@if ($paginator->hasPages())
    <nav aria-label="Page navigation">
        <ul class="pagination pagination-lg m-0" style="justify-content: space-between">
            {{-- Previous Page Link --}}
            <li class="page-item {{ $paginator->onFirstPage()?'disabled':'' }}">
                <a class="page-link rounded-0" href="{{ $paginator->previousPageUrl() }}" aria-label="Previous">
                    <span aria-hidden="true"><i class="bi bi-arrow-left"></i></span>
                </a>
            </li>

            {{-- Next Page Link --}}
            <li class="page link {{ $paginator->hasMorePages()?'':'disabled' }}">
                <a class="page-link rounded-0" href="{{ $paginator->nextPageUrl() }}" aria-label="Next">
                    <span aria-hidden="true"><i class="bi bi-arrow-right"></i></span>
                </a>
            </li>
        </ul>
    </nav>
@endif
