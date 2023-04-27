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
    <link rel="stylesheet" href="{{ asset('css/catalog.css') }}">
    <title>Главная</title>
</head>

<body>
    @include('includes.header')
    <main class="all">
        <div class="right_catalog favouritess">
            <div class="catalog_top_h1">
                <h1>Избранное</h1>
            </div>
            <div class="catalog_tovars fav_tov">
                <div class="catalog_tovars_two">
                    {{-- <div class="catalog_tovar">
                        <form action="" method="POST" class="img_heart_tovar">
                            <button type="submit" class="button_heart_tovar" name="heart_tovar_del"><img src="/img/icons/close_big.png" alt=""></button>
                            <input type="hidden" name="id" value="">
                        </form>
                        <a href="#"><div class="img_popular_tovar"><picture><img src="/img/products/Беговая дорожка Dfit Maxima X New/3e9ea88ba59168b9070846ae679498ed.jpg" alt=""></picture></div></a>
                        <div class="about_popular_tovar">
                            <a href="#">
                                <p class="p_about_popular_tovar"></p>
                            </a>
                            <div class="price_popular_tovar">
                                <div class="form_price_popular_tovar">
                                    <div class="price">
                                        <p class="p_price"></p>
                                        <img class="img_rub" src="/img/popular tovar/XMLID 449.png" alt="">
                                    </div>
                                    <a href="#" class="add_basket"><img class="img_add_basket" src="/img/popular tovar/Buy.png" alt=""></a>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
            {{-- <div class="basket_top">
                <h1>В избранном ничего нет</h1>
            </div>
            <div class="right_catalog favourites">
                <div class="catalog_tovars">
                    <div class="catalog_tovars_two">

                    </div>
                </div>
            </div> --}}
        </div>
    </main>
    @include('includes.footer')
</body>

</html>