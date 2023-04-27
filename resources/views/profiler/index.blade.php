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
    <title>Главная</title>
</head>

<body>
    @include('includes.header')
    <main class="all main_profile myprofile">
        <div>
            <button class="myProfile_button">Мой профиль</button>
            <button class="myOrders_button">Мои заказы</button>
        </div>
        <nav>
            <h1 class="h1_Myprofile">Мой профиль</h1>
            <div>
                <div>
                    <p>Имя</p>
                    <p>Фамилия</p>
                    <p>Телефон</p>
                    <p>Email</p>
                    <p>Адрес</p>
                </div>
                <nav>
                    <p>{{ $user->name }}</p>
                    <p>{{ $user->surname != null ? $user->surname : '-' }}</p>
                    <p>{{ $user->tel }}</p>
                    <p>{{ $user->email }}</p>
                    <p>{{ $user->city != null ? $user->city : '-' }}</p>
                    <button class="profileUpd_button">Редактировать</button>
                </nav>
            </div>
        </nav>
        <section class="updProfile_block">
            <h1 class="h1_Myprofile">Редактировать профиль</h1>
            <div>
                <div>
                    <p>Имя<span>*</span></p>
                    <p>Фамилия<span></span></p>
                    <p>Телефон<span>*</span></p>
                    <p>Email<span>*</span></p>
                    <p>Адрес</p>
                </div>
                <form class="form_profileUpd" action="{{ route('profiler.update', $user->id) }}" method="post">
                    @csrf
                    @method('patch')
                    <div>
                        <input type="text" name="name" placeholder="Имя" value="{{ $user->name }}" required>
                        @error('name')
                            <div class="err">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <input type="text" name="surname" placeholder="Фамилия" value="{{ $user->surname }}">
                        @error('surname')
                            <div class="err">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <input type="text" name="tel" placeholder="Номер телефона" value="{{ $user->tel }}"
                            required>
                        @error('tel')
                            <div class="err">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <input type="email" name="email" placeholder="Email" value="{{ $user->email }}" required>
                        @error('email')
                            <div class="err">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <input type="text" name="street" placeholder="Улица" value="{{ $user->street }}">
                        @error('street')
                            <div class="err">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <input type="text" name="city" placeholder="Город" value="{{ $user->city }}">
                        @error('city')
                            <div class="err">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <input type="text" name="region" placeholder="Регион" value="{{ $user->region }}">
                        @error('region')
                            <div class="err">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <input type="number" name="postal_code" placeholder="Почтовый индекс"
                            value="{{ $user->postal_code }}">
                        @error('postal_code')
                            <div class="err">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <input type="text" name="country" placeholder="Страна" value="{{ $user->country }}">
                        @error('country')
                            <div class="err">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="buttonss">
                        <div class="profileUpd_button profileUpdNon_button"><span>Отмена</span></div>
                        <button type="submit" name="profile_upd" class="profileUpd_button">Редактировать</button>
                    </div>
                </form>
            </div>
        </section>
    </main>
    @include('includes.footer')
</body>

</html>
