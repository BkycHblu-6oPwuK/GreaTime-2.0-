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
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
    <link rel="stylesheet" href="{{ asset('css/catalog.css') }}">
    <title>Главная</title>
</head>

<body>
    @include('includes.header')
    <main class="all main_profile myreviews">
        @include('includes.navbar_profile')
        <section class="my_reviews">
            <h1 class="h1_Myprofile">Мои отзывы</h1>
            <div class="sorting">
                @csrf
                @method('delete')
                <a class="a-btn active" data-status="1">Опубликованные</a>
                <a class="a-btn" data-status="0">На рассмотрении</a>
                <a class="a-btn" data-status="2">Заблокированные</a>
            </div>
            <div class="reviews_block">
                {{-- <div class="my_reviews_block">
                    <div class="my_review_header">
                        <div class="about">
                            <span>Отзыв на товар от 26.04.2002</span>
                        </div>
                        <form method="POST" action="" class="order_header_del_btn">
                            @csrf
                            @method('delete')
                            <input type="submit" name="upd_order" class="btn_upd_order" value="Изменить">
                        </form>
                        <form method="POST" action="" class="order_header_del_btn">
                            @csrf
                            @method('delete')
                            <input type="submit" name="del_order" class="btn_del_order" value="Удалить">
                        </form>
                    </div>
                    <div class="my_review_body">
                        <p>Отзыв заблокирован</p>
                    </div>
                </div> --}}
            </div>
        </section>
    </main>
    @include('includes.footer')
</body>

</html>
