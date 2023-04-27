@if ($orders->count() > 0)
    <div class="block_my_order">
        <div class="my_order_header">
            <div class="info_my_order">
                <div class="about_order_arr"><img src="{{ asset('img/icons/pngwing.png') }}" alt=""></div>
                <div class="name_my_order">Заказ GG-{{ $order->id }} от {{ $order->getCreatedAtFormatted() }}</div>
                <div class="status_my_order">{{ $order->statusMyOrder() }}</div>
                @if ($order->status == 0 || $order->status == 1 || $order->status == 2)
                    {{-- <div class="name_my_order">{{ $order->payment_method }}</div> --}}<div class="status_my_order">{{ $order->statusPayment() }}</div>
                    <div class="status_my_order">{{ $order->shipping_methods }}</div>
                @endif
            </div>
            <form method="POST" action="{{ route('orders.canc.del',$order->id) }}" class="order_header_del_btn">
                @csrf
                @if ($order->status == 0 || $order->status == 1 || $order->status == 2)
                    <input type="submit" name="canc_order" class="btn_del_order" value="Отменить">
                @else
                    <input type="submit" name="del_order" class="btn_del_order" value="Удалить">
                @endif
            </form>
        </div>
        <div class="order_body order_body_click">
            <div class="images_products">
                @foreach ($order->productsInOrders as $product)
                    <div class="image_product">
                        <img src="{{ asset('img/products/' . $product->name . '/' . $product->image . '') }}"
                            alt="">
                    </div>
                @endforeach
            </div>
            <div class="order_price_block">
                <div class="order_price">Итого: {{ $order->price_itog }} ₽</div>
                <div class="order_number_prod">Товаров: {{ $order->orderList->count() }} шт.</div>
            </div>
        </div>
        <div class="order_body order_details">
            <div class="order_conditions">
                <div class="order_conditions_block">
                    <span>Способ получения:</span>
                    <span>{{ $order->shipping_methods }}</span>
                </div>
                @if ($order->shipping_methods == 'Курьером')
                    <div class="order_conditions_block">
                        <span>Адрес доставки:</span>
                        <span>{{ 'Улица: ' . $order->street . ', ' . 'Дом: ' . $order->home . ', ' . 'Подъезд: ' . $order->entrance . ', ' . 'Квартира: ' . $order->flat }}</span>
                    </div>
                @endif
                <div class="order_conditions_block">
                    <span>Телефон получателя:</span>
                    <span>{{ $order->telephone }}</span>
                </div>
            </div>
            <div class="order_price_block">
                <div class="order_price">Итого: {{ $order->price_itog }} ₽</div>
            </div>
        </div>
        @foreach ($order->orderList as $item)
            <div class="order_body order_details_prod order_details">
                <div class="image_product">
                    <a href="#"><img
                            src="{{ asset('img/products/' . $item->products->name . '/' . $item->products->image . '') }}"
                            alt=""></a>
                </div>
                <div class="order_product_desc">
                    <div class="product_name"><a href="#">{{ $item->products->name }}</a></div>
                    @if ($item->size != null)
                        <div class="product_num">
                            <span>Размер:</span>
                            <span>{{ $item->size }}</span>
                        </div>
                    @endif
                    <div class="product_num">
                        <span>Артикул товара:</span>
                        <span>{{ $item->products->article }}</span>
                    </div>
                    @if (auth()->user()->reviews->contains('id_prod', $item->products->id))
                        <div class="product_rev">
                            <a href="#">Изменить отзыв</a>
                        </div>
                    @else
                        @if ($order->status == 3)
                            <div class="product_rev">
                                <a href="#">Оставить отзыв</a>
                            </div>
                        @endif
                    @endif
                </div>
                <div class="order_price_block">
                    <div class="order_price">Цена: {{ $item->amount * $item->priceInSalePromokode() }}</div>
                    <div class="order_number_prod"><span class="order_prod_amount">{{ $item->amount }}</span> шт. x
                        <span class="order_prod_price">{{ $item->priceInSalePromokode() }}</span> ₽</div>
                </div>
            </div>
        @endforeach
    </div>
@endif
