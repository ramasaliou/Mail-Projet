@if ($paginator->hasPages())
<ul class="pagination pagination-rounded justify-content-center mt-4">
    {{-- !!Previous page Link --}}
    @if ($paginator->onFirstPage())
        <li class="page-item disabled"><a href="javascript:;"class="page-link">Prev</a></li>
    @else
    <li class="page-item"><a href="javacript:;" wire:click='previousPage' class="page-link">Prev</a></li>   
    @endif
    {{-- todo Pagination Element Here --}}
    @foreach ($elements as $element)
    {{-- todo Make dots here --}}
    @if(is_string($element))
    <li class="page-item disabled"><a class="page-link"><span>{{$element}}</span></a></li>   
      
    @endif

    @if (is_array($element))
    @foreach ($element as $page=>$url)
    @if ($page == $paginator->currentPage())
    <li class="page-item active" aria-current="page"><a href="javacript:;" wire:click='gotoPage({{$page}})' rel="prev" class="page-link"><span>{{$page}}</span></a></li>
     @else
    <li class="page-item " aria-current="page"><a href="javacript:;" wire:click='gotoPage({{$page}})' rel="prev" class="page-link"><span>{{$page}}</span></a></li>


    @endif
        
    @endforeach
    @endif
       
    @endforeach
    @if ($paginator->hasMorePages())
        <li class="page-item "><a href="javacript:;" wire:click='nextPage'   class="page-link">Next</a></li>
    @else
        <li class="page-item disabled"><a href="javacript:;" class="page-link">Next</a></li>
    @endif
</ul>
    
@endif