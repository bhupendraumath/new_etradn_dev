@if ($paginator->hasPages())
<ul class="pagination">
   
    @if ($paginator->onFirstPage())
        <li class="page-item disabled">
            <span class="page-link" aria-hidden="true">‹</span>
        </li>
    @else
        <li class="page-item"><a class="page-link" href="javascript:void(0);" data-url="{{ $paginator->previousPageUrl() }}" rel="prev"><</a></li>
    @endif

    @foreach ($elements as $element)
       
        @if (is_string($element))
            <li class="page-item"><span>{{ $element }}</span></li>
        @endif
       
        @if (is_array($element))
            @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                    <li class="page-item active" aria-current="page"><a class="page-link" href="javascript:void(0);">{{$page}}</a></li>
                @else
                    <li class="page-item"><a class="page-link" href="javascript:void(0);" data-url="{{ $url }}">{{$page}}</a></li>
                @endif
            @endforeach
        @endif
    @endforeach


    @if ($paginator->hasMorePages())
        <li class="page-item"><a href="javascript:void(0);" class="page-link" data-url="{{ $paginator->nextPageUrl() }}" rel="next">></a></li>
    @else
        <li class="page-item disabled"><a href="javascript:void(0);" class="page-link" rel="next">></a></li>
    @endif
</ul>
@endif 
