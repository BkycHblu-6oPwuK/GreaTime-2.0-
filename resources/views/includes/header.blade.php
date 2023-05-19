<header>
    <div class="top">
        <div class="top_two">
            <div class="region"><span>Омск</span></div>
            <div class="for">
                <!-- <a href="#">Оптовым покупателям</a>
                <a href="#">Розничным покупателям</a>
                <a href="#">Регистрация для юр.лиц</a>
                <a href="#">Регистрация для физ.лиц</a> -->
                {{-- <a href="{{ route('info.order') }}">Новости</a> --}}
                <a href="{{ route('info.order') }}">Как сделать заказ</a>
                <a href="{{ route('info.delivery') }}">Доставка и оплата</a>
                <a href="{{ route('info.refund') }}">Возврат</a>
                <a href="{{ route('info.questions') }}">Вопрос-ответ</a>
                <a href="tel:+79999999999">+7 (999) 999-99-99</a>
            </div>
        </div>
    </div>
    <div class="center">
        <div class="soc_net">
            <div class="soc_one"><a href=""><img src="{{ asset('img/icons/whatsapp.png') }}" alt=""></a></div>
            <div class="soc_two"><a href=""><img src="{{ asset('img/icons/Telegram.png') }}" alt=""></a></div>
        </div>
        <div class="logo">
            <a href="{{ route('main.index') }}"><h1 class="h_logo">GreaTime</h1></a>
            @auth
            @if (auth()->user()->status == 1)
            <div class="admin">
                <p><a class="a_admin" href="{{ route('admin.index') }}">Админ панель</a></p>
            </div>
            @endif
            @endauth
        </div>
        <div class="about_us">
            <div class="about_company"><a href="{{ route('about.index') }}">О компании</a></div>
            <!-- <div class="contacts"><a href="">Контакты</a></div> -->
        </div>
    </div>
    <div class="bottom">
        <div class="catalog">
            <div class="button_catalog">
                <a class="button_catalog_show">Каталог</a>  <!--&id_category=11 -->
            </div>
            <div class="menu_filter">
                <div class="menu_filter_left">
                    <ul class="menu">
                        {{-- <li class="menu_item"><a class="menu_link" href=""><span>название</span></a></li> --}}
                    </ul>
                </div>
                <div class="menu_fulter_right">
                    {{-- <div class="menu_content">
                        <ul class="menu menu_sub">
                            <li class="menu_item_sub"><div><a class="menu_link link_sub" href="#">подкатегория</a></div></li>
                            <ul class="menu menu_sub_sub">
                                <li class="menu_item_sub_sub"><a class="menu_link link_sub_sub" href="#"><span>подкатегория</span></a></li>
                            </ul>
                        </ul>
                    </div> --}}
                </div>
            </div>
        </div>
        <div class="presearch__overlay"></div>
        <div class="search search_box">
            <form action="{{ route('catalog.index') }}" method="get">
                <div class="pole_search">
                    <input type="text" name="search" required id="search" value="{{ request()->get('search') !== null ? request()->get('search') : '' }}" placeholder="Найти любимые товары" id="">
                </div>
                <div class="button_search">
                    <input type="submit" value="Найти">
                </div> 
            </form>
            <div id="search_box-result"></div>
        </div> 
        <div class="login">
            <div class="profile">
                @auth
                <div class="block_icons_header"><a href="{{ route('profiler.index') }}"><img src="{{ asset('img/icons/пользователь-96.png') }}" alt=""></a></div>
                <p>
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <input class="a_profile" type="submit" value="Выйти">
                    </form>
                </p>
                @endauth
                @guest
                <div class="block_icons_header"><a href="{{ route('login') }}"><img src="{{ asset('img/icons/пользователь-96.png') }}" alt=""></a></div>
                <p><a class="a_profile" href="{{ route('login') }}">Войти</a></p>
                @endguest
            </div>
            {{-- <a href="{{ route('favourites.index') }}" class="favorites">
                <div class="block_icons_header"><img src="{{ asset('img/icons/сердцеж.png') }}" alt=""></div>
                <p class="a_profile">Избранное</p>
            </a>
            <a href="{{ route('basket.index') }}" class="basket">
                <div class="block_icons_header"><img src="{{ asset('img/icons/корзинаж.png') }}" alt=""></div>
                <p class="a_profile">Корзина</p>
            </a> --}}
            <a href="{{ route('favourites.index') }}" class="favorites">
                <div class="block_icons_header"><img src="{{ asset('img/icons/сердце-100.png') }}" alt=""></div>
                <p class="a_profile">Избранное</p>
            </a>
            <a href="{{ route('basket.index') }}" class="basket">
                <div class="block_icons_header"><img src="{{ asset('img/icons/корзина-96.png') }}" alt=""></div>
                <p class="a_profile">Корзина</p>
            </a>
        </div>
    </div>
</header>
