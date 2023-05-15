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
            <p class="p-wrap">
                Забыли свой пароль? Без проблем. Просто сообщите нам свой адрес электронной почты, и мы вышлем вам по
                электронной почте ссылку для сброса пароля, которая позволит вам выбрать новый.</p>
            <div class="verify_bottom verify_start">
                <form class="form" method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <div>
                        <input name="email" class="input_border" type="email" value="{{ old('email') }}"
                            placeholder="Введите ваш E-mail" required>
                    </div>
                    <section>
                        <button type="submit" name="login">Отправить</button>
                    </section>
                </form>
            </div>
            @error('email')
                <div class="err m-top-minus">Пожалуйста, подождите, прежде чем повторить попытку.</div>
            @enderror
            {{-- We have emailed your password reset link --}}
            @if (session('status'))
                <div class="succ_log_vis">
                    {{ __('Мы отправили вам по электронной почте ссылку для сброса пароля.') }}
                </div>
            @endif
        </div>
    </main>
    @include('includes.footer')
</body>

</html>
