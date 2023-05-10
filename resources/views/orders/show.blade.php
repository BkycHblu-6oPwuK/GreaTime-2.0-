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
    <main class="all main_profile myorders">
        @include('includes.navbar_profile')
        <section class="my_orders">
            <h1 class="h1_Myprofile">{{ $orders->count() > 0 ? 'Мои заказы' : 'У вас нет заказов' }}</h1>
            @foreach ($orders as $order)
                @include('includes.sectionMyOrders')
            @endforeach
            {{ $orders->links() }}
        </section>
    </main>
    @include('includes.footer')
</body>

</html>