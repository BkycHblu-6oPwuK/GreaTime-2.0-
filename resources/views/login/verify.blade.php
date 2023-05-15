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
    <link rel="stylesheet" href="{{ asset('css/log_reg.css') }}">
    <title>Верификация почты</title>
</head>

<body>
    @include('includes.header')
    <main class="all">
        <div class="verify_form">
            <p class="p-wrap">
                Спасибо, что зарегистрировались! Прежде чем приступить к работе, не могли бы вы подтвердить свой адрес
                электронной почты, перейдя по ссылке, которую мы только что отправили вам по электронной почте? Если вы
                не получили это электронное письмо, мы с радостью отправим вам другое.</p>
            <div class="verify_bottom">
                <form class="" action="{{ route('verification.send') }}" method="post">
                    @csrf
                    <section>
                        <button type="submit" name="login">Отправить письмо повторно</button>
                    </section>
                </form>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
        
                    <button type="submit" name="login" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                        {{ __('Выйти') }}
                    </button>
                </form>
            </div>
            @if (session('status') == 'verification-link-sent')
            <div class="succ_log_vis">
                {{ __('На адрес электронной почты, который вы указали при регистрации, была отправлена новая ссылка для подтверждения.') }}
            </div>
        @endif
        </div>
    </main>
    @include('includes.footer')
</body>

</html>
