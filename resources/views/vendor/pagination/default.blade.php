@if(mb_substr(request()->route()->getPrefix(), 0, mb_strlen('api/')) == 'api/')
    {{-- 
        if no need to show pagination after all products loaded
        @if ($paginator->hasPages() && ((intval(request()->init_html_page_num) == 1 && $paginator->hasMorePages()) ||  intval(request()->init_html_page_num) > 1)) 
    --}}

    @if ($paginator->hasPages())
        <nav>
            <ul class="pagination undecorated_ul wrap flex_centered_item">
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage() || intval(request()->init_html_page_num) == 1)
                    <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                        <span aria-hidden="true" class="flex_centered_item">
                            <svg width="12" height="21" viewBox="0 0 12 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M 9.953125,0.03710937 0.81054688,10.380859 9.953125,20.726562 11.451172,19.402344 3.4785156,10.380859 11.451172,1.3613281 Z" />
                            </svg>
                        </span>
                    </li>
                @else
                    <li>
                        <a href="{{ $paginator->previousPageUrl() }}" class="flex_centered_item" rel="prev" aria-label="@lang('pagination.previous')">
                            <svg width="12" height="21" viewBox="0 0 12 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M 9.953125,0.03710937 0.81054688,10.380859 9.953125,20.726562 11.451172,19.402344 3.4785156,10.380859 11.451172,1.3613281 Z" />
                            </svg>
                        </a>
                    </li>
                @endif

                {{-- Pagination Elements --}}
                @foreach ($elements as $element)
                    {{-- "Three Dots" Separator --}}
                    @if (is_string($element))
                        <li class="disabled" aria-disabled="true" data-class="number"><span class="flex_centered_item">{{ $element }}</span></li>
                    @endif

                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if(
                                (
                                    intval(request()->init_html_page_num) > 1 
                                    && intval($page) < intval(request()->init_html_page_num) 
                                ) 
                                || intval($page) > $paginator->currentPage()
                                || intval($page) == intval(request()->init_html_page_num)
                            )
                                @if (intval($page) == intval(request()->init_html_page_num))
                                    <li class="active" aria-current="page" data-class="number"><span class="flex_centered_item">{{ $page }}</span></li>
                                @else
                                    <li data-class="number"><a class="flex_centered_item" href="{{ $url }}">{{ $page }}</a></li>
                                @endif

                            @else
                                @if(intval($page) > intval(request()->init_html_page_num))
                                    <li class="opened" aria-current="page" data-class="number"><span class="flex_centered_item border_color_n2">{{ $page }}</span></li>
                                @endif
                            @endif
                        @endforeach
                    @endif
                @endforeach

                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <li>
                        <a href="{{ $paginator->nextPageUrl() }}" class="flex_centered_item" rel="next" aria-label="@lang('pagination.next')">
                            <svg width="12" height="21" viewBox="0 0 12 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M 1.9609375,0.03710937 0.46289063,1.3613281 8.4355469,10.380859 0.46289063,19.402344 1.9609375,20.726562 11.103516,10.380859 Z" />
                            </svg>
                        </a>
                    </li>
                @else
                    <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                        <span aria-hidden="true" class="flex_centered_item">
                            <svg width="12" height="21" viewBox="0 0 12 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M 1.9609375,0.03710937 0.46289063,1.3613281 8.4355469,10.380859 0.46289063,19.402344 1.9609375,20.726562 11.103516,10.380859 Z" />
                            </svg>
                        </span>
                    </li>
                @endif
            </ul>
        </nav>
    @endif
@else
    @if ($paginator->hasPages())
        <nav>
            <ul class="pagination undecorated_ul wrap flex_centered_item">
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                    <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                        <span aria-hidden="true" class="flex_centered_item">
                            <svg width="12" height="21" viewBox="0 0 12 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M 9.953125,0.03710937 0.81054688,10.380859 9.953125,20.726562 11.451172,19.402344 3.4785156,10.380859 11.451172,1.3613281 Z" />
                            </svg>
                        </span>
                    </li>
                @else
                    <li>
                        <a href="{{ $paginator->previousPageUrl() }}" class="flex_centered_item" rel="prev" aria-label="@lang('pagination.previous')">
                            <svg width="12" height="21" viewBox="0 0 12 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M 9.953125,0.03710937 0.81054688,10.380859 9.953125,20.726562 11.451172,19.402344 3.4785156,10.380859 11.451172,1.3613281 Z" />
                            </svg>
                        </a>
                    </li>
                @endif

                {{-- Pagination Elements --}}
                @foreach ($elements as $element)
                    {{-- "Three Dots" Separator --}}
                    @if (is_string($element))
                        <li class="disabled" aria-disabled="true" data-class="number"><span class="flex_centered_item">{{ $element }}</span></li>
                    @endif

                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <li class="active" aria-current="page" data-class="number"><span class="flex_centered_item">{{ $page }}</span></li>
                            @else
                                <li data-class="number"><a class="flex_centered_item" href="{{ $url }}">{{ $page }}</a></li>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <li>
                        <a href="{{ $paginator->nextPageUrl() }}" class="flex_centered_item" rel="next" aria-label="@lang('pagination.next')">
                            <svg width="12" height="21" viewBox="0 0 12 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M 1.9609375,0.03710937 0.46289063,1.3613281 8.4355469,10.380859 0.46289063,19.402344 1.9609375,20.726562 11.103516,10.380859 Z" />
                            </svg>
                        </a>
                    </li>
                @else
                    <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                        <span aria-hidden="true" class="flex_centered_item">
                            <svg width="12" height="21" viewBox="0 0 12 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M 1.9609375,0.03710937 0.46289063,1.3613281 8.4355469,10.380859 0.46289063,19.402344 1.9609375,20.726562 11.103516,10.380859 Z" />
                            </svg>
                        </span>
                    </li>
                @endif
            </ul>
        </nav>
    @endif
@endif