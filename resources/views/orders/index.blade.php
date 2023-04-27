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
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <link rel="stylesheet" href="{{ asset('css/make_order.css') }}">
    <title>Главная</title>
</head>

<body>
    @include('includes.header')
    <main class="all main_order">
        <form class="form_order" action="{{ route('orders.create') }}" method="POST">
            @csrf
            <div class="main_order_details">
                <h1>Оформление заказа</h1>
                <div class="order_details">
                    <div class="about_order">
                        <div class="about_order_block">
                            <div class="about_order_block_name">Оформляем {{ $baskets->count() }} товара</div>
                            <div class="about_order_block_price">
                                за <p class="itog_price_order"></p> ₽
                                <input name="price_itog" class="itog_price_order_input" type="hidden" value="">
                            </div>
                        </div>
                        <div class="about_order_arrow"><img src="{{ asset('img/icons/pngwing.png') }}" alt="">
                        </div>
                    </div>
                    <div class="order_details_products">
                        @for ($i = 0; $i < $baskets->count(); $i++)
                            <div class="details_products">
                                <input name="id_products" type="hidden" value="{{ $products[$i]->id_product }}">
                                <div class="details_prod_title"><span>Название:
                                        {{ $products[$i]->name }}{{ $baskets[$i]->size != null ? ', размер: ' . $baskets[$i]->size . '' : '' }}
                                    </span>(<p>{{ $baskets[$i]->amount }}</p>)шт.</div>
                                <div class="details_prod_price"><input name="price_one" type="hidden"
                                        value="{{ $products[$i]->price }}"><span></span>₽</div>
                            </div>
                        @endfor
                    </div>
                </div>
            </div>
            <div class="order_left">
                <div class="delivery_method">
                    <h1>Способы доставки</h1>
                    <div>
                        <label><input class="inp_sam" name="shipping_methods" value="Самовывоз" type="radio"
                                required><span>Самовывоз</span></label>
                        <!-- <input name="delivery_method" value="Почта России" type="radio" required><span>Почта России</span> -->
                        <label><input class="inp_delivery" name="shipping_methods" value="Курьером" type="radio"
                                required><span>Курьером</span></label>
                    </div>
                </div>
                <div class="buyer buer_adress">
                    <h1>Адрес</h1>
                    <nav>
                        <input name="street" type="text" placeholder="Улица">
                        <input name="home" type="text" placeholder="Дом">
                    </nav>
                    <div>
                        <input name="entrance" type="text" placeholder="Подъезд">
                        <input name="flat" type="text" placeholder="Квартира">
                    </div>
                </div>
                <div class="buyer">
                    <h1>Покупатель</h1>
                    <nav>
                        <input name="name" type="text" placeholder="Имя" value="{{ auth()->user()->name }}" required>
                        <input name="surname" type="tel" placeholder="Фамилия" value="{{ auth()->user()->surname }}" required>
                    </nav>
                    <div>
                        <input name="telephone" type="text" placeholder="Телефон" value="{{ auth()->user()->tel }}" required>
                        <input name="email" type="email" placeholder="E-Mail" value="{{ auth()->user()->email }}" required>
                    </div>
                </div>
                <div class="pay_method">
                    <h1>Способы оплаты</h1>
                    <nav>
                        <div><label><input name="payment_method" value="Онлайн оплата" type="radio"
                                    required><span>Онлайн оплата на сайте</span></label></div>
                        <div><label><input name="payment_method" value="Картой при получении" type="radio"
                                    required><span>Картой при получении</span></label></div>
                    </nav>
                    <div>
                        <div><label><input name="payment_method" value="Наличными курьеру" type="radio"
                                    required><span>Наличными курьеру</span></label></div>
                        <div><label><input name="payment_method" value="По QR коду при получении" type="radio"
                                    required><span>Оплата картой по QR коду при получении</span></label></div>
                    </div>
                </div>
                <div class="order_consert">
                    <!-- <div><input class="legal_entity_check" type="checkbox" value="legal_entity"><span>Я оформляю заказ как юридическое лицо</span></div> -->
                    <nav><label><input type="checkbox" required><span>Я согласен(-на) политикой
                                конфиденциальности</span></label></nav>
                </div>
                <!-- <div class="buyer legal_entity">
                    <h1>Информация об организации</h1>
                    <div>
                        <nav class="block_input_legal_entity">
                            <input name="inn" type="text" placeholder="ИНН">
                            <input name="kpp" type="text" placeholder="КПП">
                            <input name="bik" type="text" placeholder="БИК">
                            <input name="bank" type="text" placeholder="Банк">
                        </nav>
                        <div class="block_input_legal_entity">
                            <input name="name_org" type="text" placeholder="Нименование">
                            <input name="legal_address" type="text" placeholder="Юр. адрес">
                            <input name="k_s" type="text" placeholder="К/С">
                            <input name="r_s" type="text" placeholder="Р/С">
                        </div>
                    </div>
                </div> -->
                <div class="mailling">
                    <h1>Подпишись на нашу рассылку</h1>
                </div>
                <div class="order_buy">
                    <label><input type="checkbox"><span>Новости компании и уникальные скидки для
                            подписчиков</span></label>
                </div>
                <input name="add_order" type="submit" value="Оформить заказ">
            </div>
        </form>
    </main>
    @include('includes.footer')
</body>

</html>
