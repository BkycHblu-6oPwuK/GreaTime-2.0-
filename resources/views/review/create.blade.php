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
    <link rel="stylesheet" href="{{ asset('css/paga_tovar.css') }}">
    <title>Главная</title>
</head>

<body>
    @include('includes.header')
    <main class="all">
        <div class="tovar_rev_block tovar_addrev_block">
            <form method="POST" action="{{ route('review.store', $product->id) }}" class="tovar_rev">
                @csrf
                <div class="rev_header">
                    <div class="rev_user_name">Ваша оценка товару: <a
                            href="{{ route('product.show', $product->id) }}">{{ $product->name }}</a></div>
                </div>
                <div class="stars">
                    <select name="estimation" id="" required>
                        @if (!isset($review))
                            <option disabled selected value>Выберите оценку</option>
                        @endif
                        @for ($i = 1; $i <= 5; $i++)
                            <option value="{{ $i }}"
                                {{ isset($review) && $review->estimation == $i ? 'selected' : '' }}>{{ $i }}
                            </option>
                        @endfor
                    </select>
                    @error('estimation')
                        <div class="err">{{ $message }}</div>
                    @enderror
                </div>
                <div class="rev_body">
                    <div class="rev_plus">
                        <div class="rev_title">Достоинства:</div>
                        <div class="rev_desc">
                            <textarea name="plus" id="" cols="100" rows="10" required>{{ isset($review) ? $review->plus : '' }}</textarea>
                            @error('plus')
                                <div class="err">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="rev_minus">
                        <div class="rev_title">Недостатки:</div>
                        <div class="rev_desc">
                            <textarea name="minus" id="" cols="100" rows="10"required>{{ isset($review) ? $review->minus : '' }}</textarea>
                            @error('minus')
                            <div class="err">{{ $message }}</div>
                        @enderror
                        </div>
                    </div>
                    <div class="rev_comment">
                        <div class="rev_title">Комментарий:</div>
                        <div class="rev_desc">
                            <textarea name="comment" id="" cols="100" rows="10"required>{{ isset($review) ? $review->comment : '' }}</textarea>
                            @error('comment')
                            <div class="err">{{ $message }}</div>
                        @enderror
                        </div>
                    </div>
                </div>
                <input name="{{ isset($review) ? 'upd_rev' : 'add_rev' }}" type="submit"
                    value="{{ isset($review) ? 'Изменить отзыв' : 'Добавить отзыв' }}">
            </form>
        </div>
    </main>
    @include('includes.footer')
</body>

</html>
