@php
    $page = $paginator->currentPage();
    $str_pag = $paginator->lastPage();
    $filename = $paginator->path();
    if (count(request()->query()) > 0 || request()->get('search')) {
        $params = array_filter(
            $_GET,
            function ($key) {
                return $key !== 'page';
            },
            ARRAY_FILTER_USE_KEY,
        );
    
        $queryString = http_build_query(array_merge($params));
    }
@endphp
@if (count(request()->query()) > 1 || request()->get('search'))
    <div class="catalog_bottom">
        <ul class="pagination">
            @if ($paginator->currentPage() == 1)
                <li>
                    @if ($page < $str_pag)
                        <a class="data" data-page-number="{{ $paginator->currentPage() }}"
                            href="{{ $filename }}?page={{ $paginator->currentPage() }}">{{ $paginator->currentPage() }}</a>
                    @endif
                </li>
                <li>
                    @if ($page < $str_pag)
                        <a data-page-number="{{ $page = $page + 1 }}"
                            href="{{ $filename }}?page={{ $page . '&' . $queryString }}">{{ $page }}</a>
                    @endif
                </li>
                <li>
                    @if ($page < $str_pag)
                        <a data-page-number="{{ $page = $page + 1 }}"
                            href="{{ $filename }}?page={{ $page . '&' . $queryString }}">{{ $page }}</a>
                    @endif
                </li>
                <li>
                    @if ($page < $str_pag)
                        <a data-page-number="{{ $page = $page + 1 }}"
                            href="{{ $filename }}?page={{ $page . '&' . $queryString }}">{{ $page }}</a>
                    @endif
                </li>
                <li>
                    @if ($page < $str_pag)
                        <a data-page-number="{{ $page = $page + 1 }}"
                            href="{{ $filename }}?page={{ $page . '&' . $queryString }}">{{ $page }}</a>
                    @endif
                </li>
                <li>
                    @if ($paginator->currentPage() < $str_pag)
                        <a data-page-number="{{ $paginator->currentPage() + 1 }}"
                            href="{{ $filename }}?page={{ $paginator->currentPage() + 1 . '&' . $queryString }}">
                            <img src="{{ asset('img/icons/Arrow_Right_one.png') }}">
                        </a>
                    @endif
                </li>
                <li>
                    @if ($paginator->currentPage() < $str_pag)
                        <a data-page-number="{{ $str_pag }}"
                            href="{{ $filename }}?page={{ $str_pag . '&' . $queryString }}">
                            <img src="{{ asset('img/icons/Arrow_Right_2.png') }}">
                        </a>
                    @endif
                </li>
            @endif


            @if ($paginator->currentPage() == 2)
                <li>
                    @if ($paginator->currentPage() <= $str_pag)
                        <a data-page-number="1" href="{{ $filename }}?page=1{{ '&' . $queryString }}">
                            <img src="{{ asset('img/icons/Arrow_Left_2.png') }}">
                        </a>
                    @endif
                </li>
                <li>
                    @if ($paginator->currentPage() <= $str_pag)
                        <a data-page-number="{{ $paginator->currentPage() - 1 }}"
                            href="{{ $filename }}?page={{ $paginator->currentPage() - 1 . '&' . $queryString }}">
                            <img src="{{ asset('img/icons/Arrow_Left_one.png') }}">
                        </a>
                    @endif
                </li>
                <li>
                    <a data-page-number="1" href="{{ $filename }}?page=1{{ '&' . $queryString }}">1</a>
                </li>
                <li>
                    <a data-page-number="2" href="{{ $filename }}?page=2{{ '&' . $queryString }}">2</a>
                </li>
                <li>
                    @if ($page <= $str_pag - 1)
                        <a data-page-number="{{ $page = $page + 1 }}"
                            href="{{ $filename }}?page={{ $page . '&' . $queryString }}">{{ $page }}</a>
                    @endif
                </li>
                <li>
                    @if ($page <= $str_pag - 1)
                        <a data-page-number="{{ $page = $page + 1 }}"
                            href="{{ $filename }}?page={{ $page . '&' . $queryString }}">{{ $page }}</a>
                    @endif
                </li>
                <li>
                    @if ($page <= $str_pag - 1)
                        <a data-page-number="{{ $page = $page + 1 }}"
                            href="{{ $filename }}?page={{ $page . '&' . $queryString }}">{{ $page }}</a>
                    @endif
                </li>
                <li>
                    @if ($page <= $str_pag - 1)
                        <a data-page-number="{{ $page = $page + 1 }}"
                            href="{{ $filename }}?page={{ $page . '&' . $queryString }}">{{ $page }}</a>
                    @endif
                </li>
                @if ($paginator->currentPage() != $str_pag)
                    <li>
                        @if ($paginator->currentPage() <= $str_pag)
                            <a data-page-number="{{ $paginator->currentPage() + 1 }}"
                                href="{{ $filename }}?page={{ $paginator->currentPage() + 1 . '&' . $queryString }}">
                                <img src="{{ asset('img/icons/Arrow_Right_one.png') }}">
                            </a>
                        @endif
                    </li>
                    <li>
                        @if ($paginator->currentPage() <= $str_pag)
                            <a data-page-number="{{ $str_pag }}"
                                href="{{ $filename }}?page={{ $str_pag . '&' . $queryString }}">
                                <img src="{{ asset('img/icons/Arrow_Right_2.png') }}">
                            </a>
                        @endif
                    </li>
                @endif
            @endif

            @if ($paginator->currentPage() >= 3)
                <li>
                    @if ($paginator->currentPage() <= $str_pag)
                        <a data-page-number="1" href="{{ $filename }}?page=1{{ '&' . $queryString }}"><img
                                src="{{ asset('img/icons/Arrow_Left_2.png') }}"></a>
                    @endif
                </li>
                <li>
                    @if ($paginator->currentPage() <= $str_pag)
                        <a data-page-number="{{ $paginator->currentPage() - 1 }}"
                            href="{{ $filename }}?page={{ $paginator->currentPage() - 1 . '&' . $queryString }}"><img
                                src="{{ asset('img/icons/Arrow_Left_one.png') }}"></a>
                    @endif
                </li>
                <li>
                    @if ($page <= $str_pag)
                        <a data-page-number="{{ $page = $page - 1 }}"
                            href="{{ $filename }}?page={{ $page . '&' . $queryString }}">{{ $page }}</a>
                    @endif
                </li>
                <li>
                    @if ($page <= $str_pag - 1)
                        <a data-page-number="{{ $page = $page + 1 }}"
                            href="{{ $filename }}?page={{ $page . '&' . $queryString }}">{{ $page }}</a>
                    @endif
                </li>
                <li>
                    @if ($page <= $str_pag - 1)
                        <a data-page-number="{{ $page = $page + 1 }}"
                            href="{{ $filename }}?page={{ $page . '&' . $queryString }}">{{ $page }}</a>
                    @endif
                </li>
                <li>
                    @if ($page <= $str_pag - 1)
                        <a data-page-number="{{ $page = $page + 1 }}"
                            href="{{ $filename }}?page={{ $page . '&' . $queryString }}">{{ $page }}</a>
                    @endif
                </li>
                <li>
                    @if ($page <= $str_pag - 1)
                        <a data-page-number="{{ $page = $page + 1 }}"
                            href="{{ $filename }}?page={{ $page . '&' . $queryString }}">{{ $page }}</a>
                    @endif
                </li>
                <li>
                    @if ($page <= $str_pag - 1)
                        <a data-page-number="{{ $page = $page + 1 }}"
                            href="{{ $filename }}?page={{ $page . '&' . $queryString }}">{{ $page }}</a>
                    @endif
                </li>
                @if ($paginator->currentPage() != $str_pag)
                    <li>
                        @if ($paginator->currentPage() <= $str_pag)
                            <a data-page-number="{{ $paginator->currentPage() + 1 }}"
                                href="{{ $filename }}?page={{ $paginator->currentPage() + 1 . '&' . $queryString }}"><img
                                    src="{{ asset('img/icons/Arrow_Right_one.png') }}"></a>
                        @endif
                    </li>
                    <li>
                        @if ($paginator->currentPage() <= $str_pag)
                            <a data-page-number="{{ $str_pag }}"
                                href="{{ $filename }}?page={{ $str_pag . '&' . $queryString }}"><img
                                    src="{{ asset('img/icons/Arrow_Right_2.png') }}"></a>
                        @endif
                    </li>
                @endif
            @endif

        </ul>
    </div>
@elseif(count(request()->query()) <= 1)
    <div class="catalog_bottom">
        <ul class="pagination">
            @if ($paginator->currentPage() == 1)
                <li>
                    @if ($page < $str_pag)
                        <a class="data" data-page-number="{{ $paginator->currentPage() }}"
                            href="{{ $filename }}?page={{ $paginator->currentPage() }}">{{ $paginator->currentPage() }}</a>
                    @endif
                </li>
                <li>
                    @if ($page < $str_pag)
                        <a data-page-number="{{ $page = $page + 1 }}"
                            href="{{ $filename }}?page={{ $page }}">{{ $page }}</a>
                    @endif
                </li>
                <li>
                    @if ($page < $str_pag)
                        <a data-page-number="{{ $page = $page + 1 }}"
                            href="{{ $filename }}?page={{ $page }}">{{ $page }}</a>
                    @endif
                </li>
                <li>
                    @if ($page < $str_pag)
                        <a data-page-number="{{ $page = $page + 1 }}"
                            href="{{ $filename }}?page={{ $page }}">{{ $page }}</a>
                    @endif
                </li>
                <li>
                    @if ($page < $str_pag)
                        <a data-page-number="{{ $page = $page + 1 }}"
                            href="{{ $filename }}?page={{ $page }}">{{ $page }}</a>
                    @endif
                </li>
                <li>
                    @if ($paginator->currentPage() < $str_pag)
                        <a data-page-number="{{ $paginator->currentPage() + 1 }}"
                            href="{{ $filename }}?page={{ $paginator->currentPage() + 1 }}">
                            <img src="{{ asset('img/icons/Arrow_Right_one.png') }}">
                        </a>
                    @endif
                </li>
                <li>
                    @if ($paginator->currentPage() < $str_pag)
                        <a data-page-number="{{ $str_pag }}"
                            href="{{ $filename }}?page={{ $str_pag }}">
                            <img src="{{ asset('img/icons/Arrow_Right_2.png') }}">
                        </a>
                    @endif
                </li>
            @endif


            @if ($paginator->currentPage() == 2)
                <li>
                    @if ($paginator->currentPage() <= $str_pag)
                        <a data-page-number="1" href="{{ $filename }}?page=1">
                            <img src="{{ asset('img/icons/Arrow_Left_2.png') }}">
                        </a>
                    @endif
                </li>
                <li>
                    @if ($paginator->currentPage() <= $str_pag)
                        <a data-page-number="{{ $paginator->currentPage() - 1 }}"
                            href="{{ $filename }}?page={{ $paginator->currentPage() - 1 }}">
                            <img src="{{ asset('img/icons/Arrow_Left_one.png') }}">
                        </a>
                    @endif
                </li>
                <li>
                    <a data-page-number="1" href="{{ $filename }}?page=1">1</a>
                </li>
                <li>
                    <a data-page-number="2" href="{{ $filename }}?page=2">2</a>
                </li>
                <li>
                    @if ($page <= $str_pag - 1)
                        <a data-page-number="{{ $page = $page + 1 }}"
                            href="{{ $filename }}?page={{ $page }}">{{ $page }}</a>
                    @endif
                </li>
                <li>
                    @if ($page <= $str_pag - 1)
                        <a data-page-number="{{ $page = $page + 1 }}"
                            href="{{ $filename }}?page={{ $page }}">{{ $page }}</a>
                    @endif
                </li>
                <li>
                    @if ($page <= $str_pag - 1)
                        <a data-page-number="{{ $page = $page + 1 }}"
                            href="{{ $filename }}?page={{ $page }}">{{ $page }}</a>
                    @endif
                </li>
                <li>
                    @if ($page <= $str_pag - 1)
                        <a data-page-number="{{ $page = $page + 1 }}"
                            href="{{ $filename }}?page={{ $page }}">{{ $page }}</a>
                    @endif
                </li>
                @if ($paginator->currentPage() != $str_pag)
                    <li>
                        @if ($paginator->currentPage() <= $str_pag)
                            <a data-page-number="{{ $paginator->currentPage() + 1 }}"
                                href="{{ $filename }}?page={{ $paginator->currentPage() + 1 }}">
                                <img src="{{ asset('img/icons/Arrow_Right_one.png') }}">
                            </a>
                        @endif
                    </li>
                    <li>
                        @if ($paginator->currentPage() <= $str_pag)
                            <a data-page-number="{{ $str_pag }}"
                                href="{{ $filename }}?page={{ $str_pag }}">
                                <img src="{{ asset('img/icons/Arrow_Right_2.png') }}">
                            </a>
                        @endif
                    </li>
                @endif
            @endif

            @if ($paginator->currentPage() >= 3)
                <li>
                    @if ($paginator->currentPage() <= $str_pag)
                        <a data-page-number="1" href="{{ $filename }}?page=1"><img
                                src="{{ asset('img/icons/Arrow_Left_2.png') }}"></a>
                    @endif
                </li>
                <li>
                    @if ($paginator->currentPage() <= $str_pag)
                        <a data-page-number="{{ $paginator->currentPage() - 1 }}"
                            href="{{ $filename }}?page={{ $paginator->currentPage() - 1 }}"><img
                                src="{{ asset('img/icons/Arrow_Left_one.png') }}"></a>
                    @endif
                </li>
                <li>
                    @if ($page <= $str_pag)
                        <a data-page-number="{{ $page = $page - 1 }}"
                            href="{{ $filename }}?page={{ $page }}">{{ $page }}</a>
                    @endif
                </li>
                <li>
                    @if ($page <= $str_pag - 1)
                        <a data-page-number="{{ $page = $page + 1 }}"
                            href="{{ $filename }}?page={{ $page }}">{{ $page }}</a>
                    @endif
                </li>
                <li>
                    @if ($page <= $str_pag - 1)
                        <a data-page-number="{{ $page = $page + 1 }}"
                            href="{{ $filename }}?page={{ $page }}">{{ $page }}</a>
                    @endif
                </li>
                <li>
                    @if ($page <= $str_pag - 1)
                        <a data-page-number="{{ $page = $page + 1 }}"
                            href="{{ $filename }}?page={{ $page }}">{{ $page }}</a>
                    @endif
                </li>
                <li>
                    @if ($page <= $str_pag - 1)
                        <a data-page-number="{{ $page = $page + 1 }}"
                            href="{{ $filename }}?page={{ $page }}">{{ $page }}</a>
                    @endif
                </li>
                <li>
                    @if ($page <= $str_pag - 1)
                        <a data-page-number="{{ $page = $page + 1 }}"
                            href="{{ $filename }}?page={{ $page }}">{{ $page }}</a>
                    @endif
                </li>
                @if ($paginator->currentPage() != $str_pag)
                    <li>
                        @if ($paginator->currentPage() <= $str_pag)
                            <a data-page-number="{{ $paginator->currentPage() + 1 }}"
                                href="{{ $filename }}?page={{ $paginator->currentPage() + 1 }}"><img
                                    src="{{ asset('img/icons/Arrow_Right_one.png') }}"></a>
                        @endif
                    </li>
                    <li>
                        @if ($paginator->currentPage() <= $str_pag)
                            <a data-page-number="{{ $str_pag }}"
                                href="{{ $filename }}?page={{ $str_pag }}"><img
                                    src="{{ asset('img/icons/Arrow_Right_2.png') }}"></a>
                        @endif
                    </li>
                @endif
            @endif
        </ul>
    </div>
@endif
