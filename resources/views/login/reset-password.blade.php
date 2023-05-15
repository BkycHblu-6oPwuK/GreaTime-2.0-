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
    <title>Восстановление пароля</title>
</head>

<body>
    @include('includes.header')
    <main class="all">
        <div class="verify_form">
            <div class="verify_bottom">
                <form class="form" action="{{ route('password.store') }}" method="post">
                    @csrf
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">
                    <div>
                        <p>Email</p>
                        <input name="email" class="input_border" readonly type="text"
                            value="{{ old('email', $request->email) }}" required>
                        @error('email')
                            <div class="err">Эта ссылка для сброса пароля больше недействительна</div>
                        @enderror
                    </div>
                    <div>
                        <p>Пароль</p>
                        <input name="password" class="input_border" type="text" required>
                        @error('password')
                            <div class="err">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <p>Повторите ваш пароль</p>
                        <input name="password_confirmation" class="input_border" type="text" required>
                        @error('password_confirmation')
                            <div class="err">{{ $message }}</div>
                        @enderror
                    </div>
                    <section>
                        <button type="submit" name="login">Сбросить пароль</button>
                    </section>
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
