@php
    $name = 'catalog_tovar';
    $filename = 'catalog';
    if (!isset(request()->page)) {
        request()->page = 1;
    }
    $page = request()->page;
    $str_pag = $products->lastPage();
    if (request()->get('min_price') != null) {
        $min = request()->get('min_price');
        $max = request()->get('max_price');
    } else {
        $min = 1;
        $max = 1;
    }
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Каталог</title>
    <link rel="stylesheet" href="{{ asset('font/stylesheet.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <link rel="stylesheet" href="{{ asset('css/catalog.css') }}">
    <link rel="stylesheet" href="{{ asset('plagins/jquery-ui/jquery-ui.css') }}">
</head>

<body>
    @include('includes.header')
    <main class="all all_catalog">
        <div class="filters">
            <div class="filters_top">
                <p>Фильтрация товаров</p>
            </div>
            <input type="hidden" id="refresh" value="no">
            <form method="GET" class="filters_brand_form">
                @if (request()->get('sorting') !== null)
                <input type="hidden" name="sorting" class="sorting_input" value="{{ request()->get('sorting') !== null ? request()->get('sorting') : 'default' }}">
                @endif
                @if (request()->get('search') !== null)
                    <input type="hidden" name="search" value="{{ request()->get('search') !== null ? request()->get('search') : '' }}">
                @endif
                <div class="filters_price">
                    <div class="filters_name"><span class="p_filters_brand_black">Цена</span></div>
                    <div class="input_price filters_checkbox">
                        <input type="text" id="min-price" name="min_price"
                            value="{{ request()->get('min_price') == $min ? request()->get('min_price') : $min_price }}">
                        <input type="text" id="max-price" name="max_price"
                            value="{{ request()->get('max_price') == $max ? request()->get('max_price') : $max_price }}">
                        <input type="hidden" id="max-price_hidden" value="{{ $max_price }}">
                    </div>
                    <div id="slider"></div>
                </div>
                @if ($brands->count() > 0)
                <div class="filters_brand">
                    <div class="filters_name"><span class="p_filters_brand_black">Бренд</span></div>
                    <label class="select_all_button">
                        <input class="input_checbox" type="checkbox" name="" value="">
                        <!-- <span class="span_checbox"></span> -->
                        <span class="span_name_filter">Все производители</span>
                    </label>
                    <div class="filters_brand_input filters_input">
                        @foreach ($brands as $brand)
                            <label class="filter_input">
                                <input class="input_checbox" type="checkbox" name="brand[]" value="{{ $brand }}"
                                {{ request()->get('brand') !== null && in_array($brand, request()->get('brand')) ? 'checked' : '' }}
                                >
                                <!-- <span class="span_checbox"></span> -->
                                <span class="span_name_filter">{{ $brand }}({{ isset($countProducts['brand'][$brand]) ? $countProducts['brand'][$brand] : '0' }})</span>
                            </label>
                        @endforeach
                    </div>
                </div>
                @endif
                @if (isset($name_char))
                @foreach ($name_char as $char)
                <div class="filters_block">
                    <div class="filters_name "><span class="p_filters_brand_black">{{ $char->name }}</span></div>
                    <label class="select_all_button">
                        <input class="input_checbox" type="checkbox" name="" value="">
                        <!-- <span class="span_checbox"></span> -->
                        <span class="span_name_filter">Все</span>
                    </label>
                    <div class="filters_brand_input filters_input">
                        @foreach ($characteristics as $characteristic)
                        @if ($char->id === $characteristic->id_name_char)
                            <label class="filter_input">
                                <input class="input_checbox" type="checkbox" name="{{ $char->name_en . '[]' }}" value="{{ $characteristic->value }}"
                                {{ request()->get($char->name_en) !== null && in_array($characteristic->value, request()->get($char->name_en)) ? 'checked' : '' }}
                                >
                                <!-- <span class="span_checbox"></span> -->
                                <span class="span_name_filter">
                                    {{ $characteristic->value }}
                                    ({{ isset($countProducts[$char->name_en][$characteristic->value]) ? $countProducts[$char->name_en][$characteristic->value] : '0' }})
                                </span>
                            </label>
                        @endif
                        @endforeach
                    </div>
                </div>
                @endforeach
                @endif
                <section><button type="submit" class="button_apply_filers">Применить</button></section>
                <section><button type="submit" class="button_close_filers">Сбросить</button></section>
            </form>
        </div>
        <div class="right_catalog">
            <div class="catalog_top_h1">
                <h1>
                    {{ $title }}
                </h1>
            </div>
            <div class="catalog_top">
                <div class="catalog_sorting">
                    <div class="sorting_text">
                        <p>Сортировка:</p>
                    </div>
                    <div class="sorting_select">
                        <select name="sorting">
                            <option value="default" {{ request()->get('sorting') == 'default' ? 'selected' : '' }} required>По умолчанию</option>
                            <option value="low" {{ request()->get('sorting') == 'low' ? 'selected' : '' }} required>Цена
                                (низкая-высокая)</option>
                            <option value="high" {{ request()->get('sorting') == 'high' ? 'selected' : '' }} required>Цена
                                (высокая-низкая)</option>
                        </select>
                    </div>
                    <!-- <div class="sorting_text">
                        <p>Показать:</p>
                    </div>
                    <form action="vendor/action/catalog_sorting/sorting_amount.php" method="POST" class="sorting_amount">
                        <select name="sorting_amount" id="">
                            <option value="2">2</option>
                            <option value="4">4</option>
                            <option value="6">6</option>
                        </select>
                    </form> -->
                </div>
            </div>
            <div class="catalog_tovars">
                <div class="catalog_tovars_two">
                    @if ($products->count() == 0)
                    <h1>Ничего не найдено</h1>
                    @endif
                    @foreach ($products as $product)
                        @include('includes.card_product')
                    @endforeach
                </div>
                {{ $products->links() }}
            </div>
        </div>
    </main>
    @include('includes.footer')
</body>

</html>
