<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('font/stylesheet.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/basket.css') }}">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <link rel="stylesheet" href="{{ asset('css/paga_tovar.css') }}">
    <title>Корзина</title>
</head>

<body>
    @include('includes.header')
    <main class="all basket_all">
        <div class="form_basket">
            @if (auth()->user()->basket->count() > 0)
            <div class="basket_top">
                <h1>Ваша корзина</h1>
            </div>
            <div class="basket_center">
                <div class="basket_pre-top">
                    <p class="basket_p_foto">Фото</p>
                    <p class="basket_p_name">Наименование товара</p>
                    <p class="basket_p_price">Цена за ед.</p>
                    <p class="basket_p_kol-vo">кол-во</p>
                    <p class="basket_p_total">Итого</p>
                </div>
                <div class="basket_paga">

                </div>
            </div>
            <div class="basket_bottom">
                <div class="bottom_price-top">
                    <div class="promokod">
                        <div>
                            <p>Промокод</p>
                            <form action="{{ route('basket.promokode.update') }}" class="form_promo" method="POST">
                                @csrf
                                @method('patch')
                                <input type="text" name="name" placeholder="Промокод" required>
                                <input type="submit" class="apply_promo" value="Применить">
                            </form>
                            <div id="erconts"></div>
                        </div>
                    </div>
                    <div class="pre_itog_price">
                        <div class="itog_price">
                            <p>Сумма</p>
                            <span></span>
                        </div>
                        <div class="summ_nds">
                            <p>НДС 20% (20% включено)</p>
                            <span></span>
                        </div>
                    </div>
                </div>
                <div class="bottom_price-bot">
                    <p>Итоговая стоимость</p>
                    <span></span>
                </div>
                <form method="GET" action="{{ route('orders.index') }}" class="zakas">
                    <button type="submit" name="zakas">Оформить заказ</button>
                </form>
            </div>
            @else
            <div class="basket_top">
                <h1>Ваша корзина пуста</h1>
            </div>
            @endif
        </div>
    </main>
    @include('includes.footer')
</body>

</html>