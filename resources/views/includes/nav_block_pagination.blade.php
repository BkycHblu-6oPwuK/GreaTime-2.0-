<div class="catalog_bottom">
    <ul class="pagination">
        @if (request()->page == 1)
            <li>
                @if ($page < $str_pag)
                    <a class="data" data-page-number="{{ request()->page }}"
                        href="{{ $filename }}?page={{ request()->page }}">{{ request()->page }}</a>
                @endif
            </li>
            <li>
                @if ($page < $str_pag)
                    <a data-page-number="{{ $page + 1 }}"
                        href="{{ $filename }}?page={{ $page + 1 }}">{{ $page + 1 }}</a>
                @endif
            </li>
            <li>
                @if ($page < $str_pag)
                    <a data-page-number="{{ $page + 2 }}"
                        href="{{ $filename }}?page={{ $page + 2 }}">{{ $page + 2 }}</a>
                @endif
            </li>
            <li>
                @if ($page < $str_pag)
                    <a data-page-number="{{ $page + 3 }}"
                        href="{{ $filename }}?page={{ $page + 3 }}">{{ $page + 3 }}</a>
                @endif
            </li>
            <li>
                @if ($page < $str_pag)
                    <a data-page-number="{{ $page + 4 }}"
                        href="{{ $filename }}?page={{ $page + 4 }}">{{ $page + 4 }}</a>
                @endif
            </li>
            <li>
                @if (request()->page < $str_pag)
                    <a data-page-number="{{ request()->page + 1 }}"
                        href="{{ $filename }}?page={{ request()->page + 1 }}">
                        <img src="{{ asset('img/icons/Arrow_Right_one.png') }}">
                    </a>
                @endif
            </li>
            <li>
                @if (request()->page < $str_pag)
                    <a data-page-number="{{ $str_pag }}" href="{{ $filename }}?page={{ $str_pag }}">
                        <img src="{{ asset('img/icons/Arrow_Right_2.png') }}">
                    </a>
                @endif
            </li>
        @endif


        @if (request()->page == 2)
            <li>
                @if (request()->page <= $str_pag)
                    <a data-page-number="1" href="{{ $filename }}?page=1">
                        <img src="{{ asset('img/icons/Arrow_Left_2.png') }}">
                    </a>
                @endif
            </li>
            <li>
                @if (request()->page <= $str_pag)
                    <a data-page-number="{{ request()->page - 1 }}"
                        href="{{ $filename }}?page={{ request()->page - 1 }}">
                        <img src="{{ asset('img/icons/Arrow_Left_one.png') }}">
                    </a>
                @endif
            </li>
            <li>
                @if ($page <= $str_pag - 1)
                    <a data-page-number="1" href="{{ $filename }}?page=1">1</a>
                @endif
            </li>
            <li>
                @if ($page <= $str_pag - 1)
                    <a data-page-number="1" href="{{ $filename }}?page=2">2</a>
                @endif
            </li>
            <li>
                @if ($page <= $str_pag - 1)
                    <a data-page-number="{{ $page + 1 }}"
                        href="{{ $filename }}?page={{ $page + 1 }}">{{ $page + 1 }}</a>
                @endif
            </li>
            <li>
                @if ($page <= $str_pag - 1)
                    <a data-page-number="{{ $page + 2 }}"
                        href="{{ $filename }}?page={{ $page + 2 }}">{{ $page + 2 }}</a>
                @endif
            </li>
            <li>
                @if ($page <= $str_pag - 1)
                    <a data-page-number="{{ $page + 3 }}"
                        href="{{ $filename }}?page={{ $page + 3 }}">{{ $page + 3 }}</a>
                @endif
            </li>
            <li>
                @if ($page <= $str_pag - 1)
                    <a data-page-number="{{ $page + 4 }}"
                        href="{{ $filename }}?page={{ $page + 4 }}">{{ $page + 4 }}</a>
                @endif
            </li>
            @if (request()->page != $str_pag)
                <li>
                    @if (request()->page <= $str_pag)
                        <a data-page-number="{{ request()->page + 1 }}"
                            href="{{ $filename }}?page={{ request()->page + 1 }}">
                            <img src="{{ asset('img/icons/Arrow_Right_one.png') }}">
                        </a>
                    @endif
                </li>
                <li>
                    @if (request()->page <= $str_pag)
                        <a data-page-number="{{ $str_pag }}"
                            href="{{ $filename }}?page={{ $str_pag }}">
                            <img src="{{ asset('img/icons/Arrow_Right_2.png') }}">
                        </a>
                    @endif
                </li>
            @endif
        @endif

        @if(request()->page >= 3)
    <li>
        @if(request()->page <= $str_pag)
            <a data-page-number="1" href="{{ $filename }}?page=1"><img src="{{ asset('img/icons/Arrow_Left_2.png') }}"></a>
        @endif
    </li>
    <li>
        @if(request()->page <= $str_pag)
            <a data-page-number="{{ request()->page - 1 }}" href="{{ $filename }}?page={{ request()->page - 1 }}"><img src="{{ asset('img/icons/Arrow_Left_one.png') }}"></a>
        @endif
    </li>
    <li>
        @if($page <= $str_pag )
            <a data-page-number="{{ $page = $page - 1 }}" href="{{ $filename }}?page={{ $page }}">{{ $page}}</a>
        @endif
    </li>
    <li>
        @if($page <= $str_pag - 1)
            <a data-page-number="{{ $page = $page + 1 }}" href="{{ $filename }}?page={{ $page }}">{{ $page }}</a>
        @endif
    </li>
    <li>
        @if($page <= $str_pag - 1)
            <a data-page-number="{{ $page = $page + 1 }}" href="{{ $filename }}?page={{ $page }}">{{ $page }}</a>
        @endif
    </li>
    <li>
        @if($page <= $str_pag - 1)
            <a data-page-number="{{ $page = $page + 1 }}" href="{{ $filename }}?page={{ $page }}">{{ $page }}</a>
        @endif
    </li>
    <li>
        @if($page <= $str_pag - 1)
            <a data-page-number="{{ $page = $page + 1 }}" href="{{ $filename }}?page={{ $page }}">{{ $page }}</a>
        @endif
    </li>
    <li>
        @if($page <= $str_pag - 1)
            <a data-page-number="{{ $page = $page + 1 }}" href="{{ $filename }}?page={{ $page }}">{{ $page }}</a>
        @endif
    </li>
    @if(request()->page != $str_pag)
        <li>
            @if(request()->page <= $str_pag)
                <a data-page-number="{{ request()->page + 1 }}" href="{{ $filename }}?page={{ request()->page + 1 }}"><img src="{{ asset('img/icons/Arrow_Right_one.png') }}"></a>
            @endif
        </li>
        <li>
            @if(request()->page <= $str_pag)
                <a data-page-number="{{ $str_pag }}" href="{{ $filename }}?page={{ $str_pag }}"><img src="{{ asset('img/icons/Arrow_Right_2.png') }}"></a>
            @endif
        </li>
    @endif
@endif



    </ul>
</div>
