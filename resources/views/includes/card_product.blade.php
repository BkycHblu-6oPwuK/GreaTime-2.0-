<div class="{{ $name }}">
    <form method="POST" class="form_add_fav img_heart_tovar">
        <button type="submit" class="button_heart_tovar" name="heart_tov"><img
                src="{{ asset('img/icons/сердце-100.png') }}" alt=""></button>
        <input type="hidden" name="id" value="{{ $product->id }}">
    </form>
    <a href="{{ route('product.show',$product->id) }}">
        <div class="img_popular_tovar">
            <picture><img src="{{ asset('img/products/' . $product->name . '/' . $product->image . '') }}"
                    alt="">
            </picture>
        </div>
    </a>
    <div class="about_popular_tovar">
        @include('includes.block_stars_review')
        <a href="{{ route('product.show',$product->id) }}">
            <p class="p_about_popular_tovar">{{ $product->name }}</p>
        </a>
        <div class="price_popular_tovar">
            <form action="{{ route('basket.create', $product->id) }}" class="form_price_popular_tovar" method="post">
                @csrf
                <div class="price">
                    <p class="p_price">{{ $product->price }}</p>
                    <img class="img_rub" src="{{ asset('img/popular tovar/XMLID 449.png') }}" alt="">
                </div>
                @if ($product->sizes->count() > 0)
                    <input type="hidden" name="size" value="{{ $product->sizes[0]->size }}">
                @endif
                <div class="btn">
                    @auth
                        @if (auth()->user()->basket->contains('id_product', $product->id))
                            <div class="add_basket"><a href="{{ route('basket.index') }}"><img class="img_add_basket"
                                        src="{{ asset('img/icons/prodInBus.png') }}" alt=""></a></div>
                        @else
                            <button type="submit" name="add_basket" class="add_basket"><img class="img_add_basket"
                                    src="{{ asset('img/icons/busk.png') }}" alt=""></button>
                        @endif
                    @endauth
                    @guest
                        <div class="add_basket"><a href="{{ route('basket.index') }}"><img class="img_add_basket"
                                    src="{{ asset('img/icons/busk.png') }}" alt=""></a></div>
                    @endguest
                </div>
            </form>
        </div>
        <div class="err_log"></div>
        <div class="succ_log"></div>
    </div>
</div>
