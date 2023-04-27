@switch(ceil($product->reviewAvg($product->id)))
    @case(5)
    <div class="stars">
        <img src="{{ asset('img/popular tovar/star_bacg.png') }}" alt="">
        <img src="{{ asset('img/popular tovar/star_bacg.png') }}" alt="">
        <img src="{{ asset('img/popular tovar/star_bacg.png') }}" alt="">
        <img src="{{ asset('img/popular tovar/star_bacg.png') }}" alt="">
        <img src="{{ asset('img/popular tovar/star_bacg.png') }}" alt="">
    </div>
        @break

    @case(4)
    <div class="stars">
        <img src="{{ asset('img/popular tovar/star_bacg.png') }}" alt="">
        <img src="{{ asset('img/popular tovar/star_bacg.png') }}" alt="">
        <img src="{{ asset('img/popular tovar/star_bacg.png') }}" alt="">
        <img src="{{ asset('img/popular tovar/star_bacg.png') }}" alt="">
        <img src="{{ asset('img/popular tovar/star.png') }}" alt="">
    </div>
        @break

    @case(3)
        <div class="stars">
            <img src="{{ asset('img/popular tovar/star_bacg.png') }}" alt="">
            <img src="{{ asset('img/popular tovar/star_bacg.png') }}" alt="">
            <img src="{{ asset('img/popular tovar/star_bacg.png') }}" alt="">
            <img src="{{ asset('img/popular tovar/star.png') }}" alt="">
            <img src="{{ asset('img/popular tovar/star.png') }}" alt="">
        </div>
        @break

    @case(2)
    <div class="stars">
        <img src="{{ asset('img/popular tovar/star_bacg.png') }}" alt="">
        <img src="{{ asset('img/popular tovar/star_bacg.png') }}" alt="">
        <img src="{{ asset('img/popular tovar/star.png') }}" alt="">
        <img src="{{ asset('img/popular tovar/star.png') }}" alt="">
        <img src="{{ asset('img/popular tovar/star.png') }}" alt="">
    </div>
        @break

    @case(1)
    <div class="stars">
        <img src="{{ asset('img/popular tovar/star_bacg.png') }}" alt="">
        <img src="{{ asset('img/popular tovar/star.png') }}" alt="">
        <img src="{{ asset('img/popular tovar/star.png') }}" alt="">
        <img src="{{ asset('img/popular tovar/star.png') }}" alt="">
        <img src="{{ asset('img/popular tovar/star.png') }}" alt="">
    </div>
        @break

    @default
    <div class="stars">
        <img src="{{ asset('img/popular tovar/star.png') }}" alt="">
        <img src="{{ asset('img/popular tovar/star.png') }}" alt="">
        <img src="{{ asset('img/popular tovar/star.png') }}" alt="">
        <img src="{{ asset('img/popular tovar/star.png') }}" alt="">
        <img src="{{ asset('img/popular tovar/star.png') }}" alt="">
    </div>
@endswitch
