@if($paginator->hasPages())
    <div class="pagination custom clearfix">
        @if ($paginator->onFirstPage())
        <a href="javascript:avoid()"><i class="fa fa-angle-double-left"></i></a>
        @else
        <a href="{{ $paginator->previousPageUrl() }}" rel="prev"><i class="fa fa-angle-double-left"></i> </a>
        @endif
        <!-- Pagination Elements -->
       @foreach ($paginator as $element)
           <!-- "Three Dots" Separator -->
           @if (is_string($element))
           <a class="disabled"><span>{{ $element }}</span></a>
           @endif

           <!-- Array Of Links -->
           @if (is_array($element))
               @foreach ($element as $page => $url)
                   @if ($page == $paginator->currentPage())
                       <a class="active" href="javascript:avoid()">{{ $page }}</a>
                   @else
                       <a href="{{ $url }}">{{ $page }}</a>
                   @endif
               @endforeach
           @endif
       @endforeach

       <!-- Next Page Link -->
    @if ($paginator->hasMorePages())
        <a href="{{ $paginator->nextPageUrl() }}" rel="next"><i class="fa fa-angle-double-right"></i></a>
    @else
        <a href="javascript:avoid()"><i class="fa fa-angle-double-right"></i></a>
    @endif

    </div>
@endif
