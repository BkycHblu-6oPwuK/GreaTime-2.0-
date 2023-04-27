<div class="tovar_basket">
    <div class="tovar_basket_img">
        <picture><img src="" alt=""></picture>
    </div>
    <div class="tovar_basket_name">
        <div>
            <h1>Артикул:</h1>
            <p></p>
        </div>
        <p></p>
        @if ($basket->size != null)
            <p>Размер: 26 </p>
        @endif
    </div>
    <div class="tovar_basket_price">
        <p>
            
        </p>
    </div>
    <div class="tovar_basket_kol-vo">
        <form action="" method="POST" class="put_plus_basket">
            <input type="hidden" name="_token" value="9K89ikDwjXN5s5lWntYweyV4Oc9unr1g1hAmkRcl">
            <input type="hidden" name="_method" value="patch">
            <button type="submut" name="button_minus" class="put_button_minus update_btn">-</button>
            <input type="hidden" name="price" value="">
            <input type="hidden" name="id_product" value="">
            <input type="hidden" name="size" value="">
            <input type="text" class="amount" name="amount" value="">
            <button type="submut" name="button_plus" class="put_button_plus update_btn">+</button>
        </form>
        <div class="err_log"></div>
    </div>
    <div class="tovar_basket_total">
        <p class="p_t-b-t">
            
        </p>
    </div>
    <form class="btn_close" action="" method="POST">
        <input type="hidden" name="_token" value="9K89ikDwjXN5s5lWntYweyV4Oc9unr1g1hAmkRcl">
        <input type="hidden" name="_method" value="delete">
        <button type="submit" name="close"><img src="" alt=""></button>
    </form>
</div>