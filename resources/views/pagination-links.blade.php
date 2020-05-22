@if ($paginator->hasPages())
<nav aria-label="Page navigation example">
    <ul class="pagination">
        {{-- prev --}}
        @if ($paginator->onFirstPage())
            <li class="page-item disabled">
                <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
                 </a>
            </li>
        @else
            <li class="page-item">
                <a class="page-link" href="#" aria-label="Previous" wire:click="previousPage">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
                 </a>
            </li>
        @endif
        {{-- prev end --}}

        {{-- numbers --}}
        @foreach ($elements as $element)
        <div>
            @if (is_array($element))
            @foreach ($element as $page =>  $url)
            @if ($page == $paginator->currentPage())
                    <li wire:click="gotoPage({{ $page }})" class="page-item active">
                        <a class="page-link" href="#">
                            {{ $page }} <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    @else
                    <li wire:click="gotoPage({{ $page }})"class="page-item">
                        <a class="page-link" href="#">
                            {{ $page }}
                        </a>
                    </li>
                    @endif
                    @endforeach
            @endif
        </div>
        @endforeach
        {{-- numbers end --}}

        {{-- next --}}
        @if ($paginator->hasMorePages())


        <li class="page-item">
                <a class="page-link" href="#" aria-label="Next" wire:click="nextPage">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                </a>
        </li>
        @else
            <li class="page-item disabled">
                <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                </a>
        </li>
        @endif
        {{-- next end --}}

    </ul>
    </nav>
    @endif
