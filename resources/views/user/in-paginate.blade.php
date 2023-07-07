<!-- <div class="text-center">
    <ul class="page-numbers">
        <li>
            <a class="next page-numbers" href="https://animehot.xyz/moi-cap-nhat/page/2/">
                <i class="hl-down-open rotate-left"></i>
            </a>
        </li>
        <li>
            <span aria-current="page" class="page-numbers current">1</span>
        </li>
        <li>
            <a class="page-numbers" href="https://animehot.xyz/moi-cap-nhat/page/2/">2</a>
        </li>
        <li>
            <a class="page-numbers" href="https://animehot.xyz/moi-cap-nhat/page/3/">3</a>
        </li>
        <li>
            <span class="page-numbers dots">…</span>
        </li>
        <li>
            <a class="page-numbers" href="https://animehot.xyz/moi-cap-nhat/page/83/">83</a>
        </li>
        <li>
            <a class="next page-numbers" href="https://animehot.xyz/moi-cap-nhat/page/2/">
                <i class="hl-down-open rotate-right"></i>
            </a>
        </li>
    </ul>
</div> -->



@if ($paginator->hasPages())
    <div class="text-center">
        <ul class="page-numbers">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <!-- <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span aria-hidden="true">&lsaquo;</span>
                </li> -->
                <!-- <li>
                    <a class="next page-numbers disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                        <i class="hl-down-open rotate-left"></i>
                    </a>
                </li> -->
            @else
                <li>
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">
                        <i class="hl-down-open rotate-left"></i>
                    </a>
                </li>
                <!-- <li>
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')" style="background:">&lsaquo;</a>
                </li> -->
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="disabled page-numbers current" aria-disabled="true"><span>{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="active" aria-current="page"><span class="page-numbers current">{{ $page }}</span></li>
                        @else
                            <li><a href="{{ $url }}" class="">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <!-- <li class="next page-numbers">
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
                </li> -->
                <li class="next page-numbers">
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">
                        <i class="hl-down-open rotate-right"></i>
                    </a>
                </li>
            @else
                <!-- <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span aria-hidden="true">&rsaquo;</span>
                </li> -->
                <!-- <li>
                    <a class="next page-numbers disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                        <i class="hl-down-open rotate-right"></i>
                    </a>
                </li> -->
            @endif
            </ul>
        </div>
@endif