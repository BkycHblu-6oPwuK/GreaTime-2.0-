@php
    $name = 'popular_tovar';
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('font/stylesheet.css') }}">
    <link rel="preconnect" href="https:/fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <link rel="stylesheet" href="{{ asset('css/paga_tovar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/catalog.css') }}">
    <link rel="stylesheet" href="{{ asset('plagins/Magnific-Popup-master/dist/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('plagins/slick-master/slick/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('plagins/slick-master/slick/slick-theme.css') }}">
    <title>Товар</title>
</head>


<body>
    @include('includes.header')
    <main class="all page_tovar_all">
        <div class="page_tovar_top">
            <div class="tovar_left">
                <div class="product-gallery">
                    <div class="product-main-image">
                        <a href="{{ asset('storage/'.$product->image.'') }}">
                            <img src="{{ asset('storage/'.$product->image.'') }}" alt="Main Image">
                        </a>
                    </div>
                    <div class="product-thumbnails">
                        @foreach ($gallary as $gal)
                        <div class="thumbnail">
                            <img src="{{ asset('storage/'.$gal->image.'') }}" alt="Thumbnail 1">
                        </div>
                        @endforeach
                    </div>
                </div>
                {{-- <div class="tovar_img_top">
                    <picture><img src="{{ asset('storage/'.$product->image.'') }}" alt=""></picture>
                </div> --}}
                <!-- <div class="tovar_img_bottom">
                    <img src="vendor/img/popular tovar/Frame 306.png" alt="">
                    <img src="vendor/img/popular tovar/Frame 306.png" alt="">
                    <img src="vendor/img/popular tovar/Frame 306.png" alt="">
                </div> -->
            </div>
            <form class="tovar_right" action="{{ route('basket.create', $product->id) }}" method="POST">
                @csrf
                <input type="hidden" name="prod" class="input_prod" value="{{ $product->id }}">
                <div class="tovar_right_top">
                    <div>
                        <h1>Артикул:</h1>
                        <p>{{ $product->article }}</p>
                    </div>
                    @include('includes.block_stars_review')
                </div>
                <div class="tovar_name">
                    <h1>{{ $product->name }}</h1>
                </div>
                <div class="tovar_about">
                    <p>{!! $product->description !!}</p>
                </div>
                <div class="char">
                    <div class="tovar_brand">
                        <p class="haracter">Бренд:</p>
                        <p class="haracter-blue">{{ $product->brand }}</p>
                    </div>
                    {{-- <div class="tovar_brand">
                            <p class="haracter">Цвет:</p>
                            <p class="haracter-blue">blue</p>
                        </div> --}}
                    @if ($product->sizes->count() > 0)
                        <div class="tovar_brand">
                            <p class="haracter">Размеры:</p>
                            @foreach ($product->sizes as $size)
                                <div class="block_sizes">
                                    <div class="block_size">{{ $size->size }}</div>
                                </div>
                            @endforeach
                            <input type="hidden" name="size" class="input_size" value="">
                        </div>
                    @endif
                    <div class="tovar_availability">
                        <p class="haracter">Наличие:</p>
                        <p class="haracter-blue" {{ $product->amount < 1 ? 'style=color:red' : '' }}
                            id="haracter_availability">
                            {{ $product->amount < 1 ? 'Нет в наличии' : 'В наличии (' . $product->amount . ') шт.' }}
                        </p>
                    </div>
                    <div class="tovar_price">
                        <p class="haracter">Цена:</p>
                        <p class="haracter-blue">{{ $product->price }}</p>
                    </div>
                </div>
                <div class="form_price_popular_tovar form_page_tovar">
                    @if ($product->amount > 0)
                        <div class="put_plus_basket">
                            <button class="put_button_minus">-</button>
                            <input class="amount" type="text" name="amount" value="1">
                            <button class="put_button_plus">+</button>
                        </div>
                    @endif
                    <div class="put_basket">
                        @if ($product->amount > 0)
                            @auth
                                <div class="btn"><button name="add_basket" class="put_tovar_button">Добавить в
                                        корзину</button></div>
                            @endauth
                            @guest
                                <a href="{{ route('basket.index') }}">
                                    <div class="put_tovar_button">Добавить в корзину</div>
                                </a>
                            @endguest
                        @endif
                        <!-- <button class="buy_tovar_button">Купить в один клик </button> -->
                        <button name="heart_tov" class="like_tovar_button"></button>
                    </div>
                </div>
                <div class="err_log"></div>
                <div class="succ_log"></div>
            </form>
        </div>
        <div class="twoButton">
            <button class="button_visibleDesc btn_active">Описание</button>
            <button class="button_visibleHar btn_not_active">Характеристики</button>
            <button data-id="id_prod" class="button_visibleRev btn_not_active">Отзывы</button>
        </div>
        <div class="page_tovar_har">
            <div class="tovar_description">
                <p>{!! $product->description !!}</p>
            </div>
            <div class="har">
                @for ($i = 0; $i < $product->characteristic->count(); $i++)
                    <div class="har_left">
                        <p>{{ $product->nameChar[$i]->name }}:</p>
                        <p>{{ $product->characteristic[$i]->value }}</p>
                    </div>
                @endfor
            </div>
            <div class="tovar_rev_block">

            </div>
        </div>
        <div class="popular">
            <p class="p_center">Популярные товары</p>
            <div class="slider_two">
                <button id="prev_slider_two" class="two_slider_button"> <img
                        src="{{ asset('img/icons/short_right2.png') }}" alt=""> </button>
                <div class="all_slider_two">
                    <div class="sl_two_line">
                        @foreach ($products as $product)
                            @include('includes.card_product')
                        @endforeach
                    </div>
                </div>
                <button id="next_slider_two" class="two_slider_button"> <img class="rotate"
                        src="{{ asset('img/icons/short_right2.png') }}"> </button>
            </div>
        </div>
    </main>
    @include('includes.footer')
</body>

</html>
