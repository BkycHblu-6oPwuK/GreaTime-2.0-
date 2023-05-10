if (!localStorage.getItem('idArray')) {
    // Если ключ 'idArray' отсутствует, создаем пустой массив и сохраняем его в localStorage
    localStorage.setItem('idArray', JSON.stringify([]));
}


//прибавляем и убавляем кол-во товаров для корзины

$(document).off('click', '.put_button_minus').on('click', '.put_button_minus', function (e) {
    e.preventDefault();
    let $input = $(this).parent().find('.amount');
    let count = parseInt($input.val()) - 1;
    count = count < 1 ? 1 : count;
    $input.val(count);
})
$(document).off('click', '.put_button_plus').on('click', '.put_button_plus', function (e) {
    e.preventDefault();
    let $input = $(this).parent().find('.amount');
    let count = parseInt($input.val()) + 1;
    count = count > parseInt($input.data('max-count')) ? parseInt($input.data('max-count')) : count;
    $input.val(parseInt(count));
})
$(document).off("change keyup input click", '.amount').on("change keyup input click", '.amount', function () {
    if (this.value.match(/[^0-9]/g)) {
        this.value = this.value.replace(/[^0-9]/g, '');
    }
    if (this.value == "") {
        this.value = 1;
    }
    if (this.value > parseInt($(this).data('max-count'))) {
        this.value = parseInt($(this).data('max-count'));
    }
})
//

const url = new URL(document.location);
const searchParams = url.searchParams;

// страница профиля

const buttonMyProfile = document.querySelector('.myProfile_button');
const buttonMyOrders = document.querySelector('.myOrders_button');
const buttonUpdProfile = document.querySelector('.profileUpd_button');
const profileUpdNon_button = document.querySelector('.profileUpdNon_button');
const buttonMyReviews = document.querySelector('.myReviews_button');

const blockMyProfile = document.querySelector('.main_profile > nav');
const blockUpdProfile = document.querySelector('.updProfile_block');

$(document).ready(function () {
    if ($('.err').length > 0) {
        blockUpdProfile.style.display = "block";
        blockMyProfile.style.display = "none";
    }
})
if ($('.myprofile').is(':visible')) {
    buttonUpdProfile.addEventListener('click', function () {
        blockUpdProfile.style.display = "block";
        blockMyProfile.style.display = "none";
    });
    profileUpdNon_button.addEventListener('click', function () {
        blockMyProfile.style.display = "block";
        blockUpdProfile.style.display = "none";
    });
    locationMyProfile();
}

if ($('.myorders').is(':visible')) {
    locationMyOrders();
}
if ($('.myreviews').is(':visible')) {
    locationMyReviews()
}

function locationMyOrders() {
    buttonMyOrders.style.color = "#FFFFFF";
    buttonMyOrders.style.background = '#4174CB';
    buttonMyOrders.style.boxShadow = '2px 0px 0px #FFB745';

    buttonMyProfile.style.color = "#333333";
    buttonMyProfile.style.background = '#ffffff';
    buttonMyProfile.style.boxShadow = 'none';
    buttonMyReviews.style.color = "#333333";
    buttonMyReviews.style.background = '#ffffff';
    buttonMyReviews.style.boxShadow = 'none';

};
function locationMyProfile() {
    buttonMyProfile.style.color = "#FFFFFF";
    buttonMyProfile.style.background = '#4174CB';
    buttonMyProfile.style.boxShadow = '2px 0px 0px #FFB745';

    buttonMyOrders.style.color = "#333333";
    buttonMyOrders.style.background = '#ffffff';
    buttonMyOrders.style.boxShadow = 'none';
    buttonMyReviews.style.color = "#333333";
    buttonMyReviews.style.background = '#ffffff';
    buttonMyReviews.style.boxShadow = 'none';

}
function locationMyReviews() {
    buttonMyReviews.style.color = "#FFFFFF";
    buttonMyReviews.style.background = '#4174CB';
    buttonMyReviews.style.boxShadow = '2px 0px 0px #FFB745';

    buttonMyProfile.style.color = "#333333";
    buttonMyProfile.style.background = '#ffffff';
    buttonMyProfile.style.boxShadow = 'none';
    buttonMyOrders.style.color = "#333333";
    buttonMyOrders.style.background = '#ffffff';
    buttonMyOrders.style.boxShadow = 'none';

}
//

// Блок с адресом в оформлении заказа
const inputLegalEntity = document.querySelectorAll('.buer_adress input');
const blockLegalEnity = document.querySelector('.buer_adress');
$(function () {
    $(".inp_delivery:checked").each(function () {
        $(blockLegalEnity).show();
    });
    $(".inp_delivery").click(function () {
        $(blockLegalEnity).show();
        $(inputLegalEntity).attr('required', true);
    });
    $('.inp_sam').click(function () {
        $(blockLegalEnity).hide();
        $(inputLegalEntity).attr('required', false);
    })
});
//

// блок с товарами на странице оформсления заказа

const blockAboutOrderArrow = document.querySelector('.about_order_arrow');
const blockAboutOrderArrowImg = document.querySelector('.about_order_arrow>img');
const blockOrderDetailsProducts = document.querySelector('.order_details_products');
$(blockAboutOrderArrow).click(function () {
    if ($(blockOrderDetailsProducts).is(':hidden')) {
        $(blockOrderDetailsProducts).css({
            "display": "flex"
        });
        $(blockAboutOrderArrowImg).css({
            "transform": "rotate(180deg)"
        });
    } else {
        $(blockOrderDetailsProducts).hide();
        $(blockAboutOrderArrowImg).css({
            "transform": "rotate(0deg)"
        });
    }
});
//

// подсчет стоимости товаров на странце оформления заказа

function itogPrice() {
    let arrayAmount = $('.details_prod_title > p').toArray().map(item => $(item).html());
    let arrayPrice = $('.details_prod_price > input').toArray().map(item => $(item).val());
    let arraySpan = $('.details_prod_price > span').toArray().map(item => $(item));

    let multiplicationItog = [];
    for (let i = 0; i < arrayAmount.length; i++) {
        multiplicationItog[i] = arrayAmount[i] * arrayPrice[i];
    }

    let itog = "";
    jQuery.each(multiplicationItog, function summ() {
        itog = Number(itog) + Number(this);
    });

    for (let i = 0; i < multiplicationItog.length; i++) {
        $(arraySpan[i]).html(multiplicationItog[i])
    }
    $(".itog_price_order").html(itog);
    $(".itog_price_order_input").val(itog);
}
itogPrice();
//

//  блок с категориями 

// Функция получения категорий и отрисовка в html
function setCategory() {
    $.ajax({
        url: "/category",
        success: function (data) {
            let a = 0;
            for (a; a < data.length; a++) {
                $('.menu_filter_left').find('.menu').append('<li class="menu_item"><a class="menu_link" data-id="' + data[a]['id'] + '" href="/catalog/' + data[a]['id'] + '"><span>' + data[a]['name'] + '</span></a></li>');
            }
        }
    });
}
$(document).ready(function () {
    setCategory();
});
// При нажатии на элемент показывается блок с категориями
$(document).on('click', '.button_catalog_show', function () {
    if ($('.menu_filter').is(':hidden')) {
        $('.menu_filter').css({
            "display": "flex"
        });
    } else {
        $('.menu_filter').hide();
    }
})

// Создаем функцию-дебаунсер
function debounce(func, wait, immediate) {
    var timeout;
    return function () {
        var context = this, args = arguments;
        var later = function () {
            timeout = null;
            if (!immediate) func.apply(context, args);
        };
        var callNow = immediate && !timeout;
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
        if (callNow) func.apply(context, args);
    };
}
// получаем их подкатегории и "подкатегории подкатегорий"
function setSubCategory(e) {
    e.preventDefault()
    let th = $(this).children().data('id');
    let tg = $(this).children().attr('href');
    $.ajax({
        url: "/category/" + th + "",
        success: function (data) {
            let i = 0
            let a = 0;
            $('.menu_fulter_right').empty();
            //отрисовывает подкатегории
            if (data[0].length > 0) {
                for (i; i < data[0].length; i++) {
                    $('.menu_fulter_right').append('<div data-id="' + data[0][i]['id'] + '" class="menu_content"><ul class="menu menu_sub"><li class="menu_item_sub"><div><a class="menu_link link_sub" href="/catalog/' + data[0][i]['id_category'] + '/' + data[0][i]['id'] + '">' + data[0][i]['name'] + '</a></div></li><ul class="menu menu_sub_sub"></ul></ul></div>')
                }
            }
            //отрисовывает подкатегории подкатегории
            if (data[1].length > 0) {
                setSubSubCategory(data)
            }
        },
        error: function (data) {
        }
    });
}
// функция для вывода "подкатегорий подкатегорий"
function setSubSubCategory(data) {
    let categories = data[0]; // Получаем массив подкатегорий
    let subcategories = data[1]; // Получаем массив подкатегорий подкатегорий
    for (let i = 0; i < categories.length; i++) {
        let categoryId = categories[i]['id']; // Получаем идентификатор текущей подкатегорий
        let categorySubs = []; // Создаем пустой массив для подкатегорий этой подкатегории
        // Находим все подкатегории подкатегории, которые соответствуют текущей подкатегории
        for (let j = 0; j < subcategories.length; j++) {
            if (subcategories[j]['id_sub_cat'] == categoryId) {
                categorySubs.push(subcategories[j]); // Добавляем подкатегорию в массив для этой подкатегории
            }
        }
        // Если у этой подкатегории есть подкатегории, добавляем их к соответствующей подкатегории в HTML
        if (categorySubs.length > 0) {
            let categoryContainer = $('.menu_fulter_right').find('[data-id="' + categoryId + '"]');
            for (let k = 0; k < categorySubs.length; k++) {
                let subSubCategoryId = categorySubs[k]['id']; // id подкатегории подкатегории
                let subCategoryId = categorySubs[k]['id_sub_cat']; // id подкатегории 
                let categoryId = categorySubs[k]['id_category']; // id категории
                let subCategoryName = categorySubs[k]['name'];
                let Url = '/catalog/' + categoryId + '/' + subCategoryId + '/' + subSubCategoryId;
                categoryContainer.find('.menu_sub_sub').append('<li class="menu_item_sub_sub"><a class="menu_link link_sub_sub" href="' + Url + '"><span>' + subCategoryName + '</span></a></li>');
            }
        }
    }
}
// Обертываем функцию-обработчик в дебаунсер с задержкой в 500 миллисекунд
var debouncedHandleMouseEnter = debounce(setSubCategory, 500);
// Навешиваем обработчик события с использованием дебаунсера
$(document).off('mouseenter', '.menu_item').on('mouseenter', '.menu_item', debouncedHandleMouseEnter);

//

$('.sorting_select > select').change(function (e) {
    // e.preventDefault();
    let sorting = $(this).val();
    $('.sorting_input').val(sorting);
    const url = new URL(window.location);
    url.searchParams.set('sorting', sorting);
    url.searchParams.set('page', '1');
    history.pushState(null, null, url);
    location.reload();
})
//

// диапазон цен
function slider() {
    $("#slider").slider({
        animate: "slow",
        range: true,
        min: 0,
        max: $('#max-price_hidden').val(),
        values: [$('#min-price').val(), $('#max-price').val()],
        slide: function (event, ui) {
            $('#min-price').val(ui.values[0]);
            $('#max-price').val(ui.values[1]);
        }
    });
}
$('.input_price > input').change(function () {
    slider();
})
$(document).ready(function () {
    slider();
});
//

// скрытие фильтров на странице каталог
$('.filters_name').click(function () {
    let parentBlock = $(this).parent();
    let childrenBlocks = parentBlock.children();
    if ($(childrenBlocks).hasClass('hide')) {
        $(childrenBlocks).removeClass('hide');
        $(childrenBlocks).addClass('active');
        childrenBlocks.not(":first").show();
    } else {
        $(childrenBlocks).removeClass('active');
        $(childrenBlocks).addClass('hide');
        childrenBlocks.not(":first").hide();
    }
})
//

// ставит галочку на чекбокс "все" когда будут выбраны все
$('.filter_input').click(function(){
    let parentBlock = $(this).parent().parent()
    console.log(parentBlock)
        jQuery.each(parentBlock,function(){
        var allChecked = true;
        jQuery.each($(this).find('.filters_input input[type="checkbox"]'),function(){
            if (!$(this).prop('checked')) {
                allChecked = false;
            }
        })
        if(allChecked){
            parentBlock.find('.select_all_button input[type="checkbox"]').prop('checked',true)
        } else {
            parentBlock.find('.select_all_button input[type="checkbox"]').prop('checked',false)
        }
    })
})
//

// при загрузке страницы проверяет чекбоксы, если хоть один выбран то блок не будет скрытым
$(document).ready(function () {
    $('.filters_brand_form').children().not('.filters_block').children().addClass('active');
    $('.filters_block').children().addClass('hide')
    jQuery.each($('.filters_brand_form').children('.filters_block'),function(){
        var allChecked = true;
        if(!$(this).find('input[type="checkbox"]').is(':checked', true)){
            $(this).children().not(":first").hide()
        } else {
            $(this).children().removeClass('hide')
            $(this).children().addClass('active')
        }
        jQuery.each($(this).find('.filters_input input[type="checkbox"]'),function(){
            if (!$(this).prop('checked')) {
                allChecked = false;
            }
        })
        if(allChecked){
            $(this).find('.select_all_button input[type="checkbox"]').prop('checked',true)
        }
    })
})
//

// удаляет все get параметры
$('.button_close_filers').click(function(e){
    e.preventDefault()
    var url = window.location.href.split('?')[0];
    window.location.href = url;
})
//

// выбрать все чекбоксы фильтров
$('.select_all_button').click(function () {
    let thisInput = $(this).children('.input_checbox');
    let filtersInput = $(this).parent().children('.filters_input').children().children('input');
    if ($(thisInput).is(':checked', true)) {
        $(filtersInput).prop('checked', true);
    } else {
        $(filtersInput).prop('checked', false);
    }
})
//

// блок заказа
const showDetailsOrder = (This, e) => {
    let orderBodyClick = $(This).closest('.block_my_order').children('.order_body_click');
    let orderDetails = $(This).closest('.block_my_order').children('.order_details');
    let aboutOrderArr = $(This).closest('.block_my_order').children('.my_order_header').children('.info_my_order').children('.about_order_arr');
    if ($(orderBodyClick).is(':hidden')) {
        $(orderDetails).hide();
        $(orderBodyClick).css({
            'display': 'flex',
        });
        $(aboutOrderArr).css({
            "transform": "rotate(0deg)"
        })
    } else {
        $(orderBodyClick).hide();
        $(orderDetails).css({
            'display': 'flex',
        });
        $(aboutOrderArr).css({
            "transform": "rotate(180deg)"
        })
    }
}
$(document).on('click', '.about_order_arr', function () {
    showDetailsOrder(this);
})
$(document).on('click', '.name_my_order', function () {
    showDetailsOrder(this);
})
$(document).on('click', '.order_body_click', function () {
    showDetailsOrder(this);
})

// Добавление в корзину
$(document).on('click', 'button[name="add_basket"]', function (e) {
    e.preventDefault();
    let th = $(this).closest('form');
    let form = new FormData(this.closest('form'));
    let btnBlock = $(this).closest('.btn');
    let blockMessage;
    if (th.closest('.popular_tovar').length > 0) {
        blockMessage = th.closest('.popular_tovar')
    }
    if (th.closest('.catalog_tovar').length > 0) {
        blockMessage = th.closest('.catalog_tovar')
    }
    if (th.closest('.tovar_right').length > 0) {
        blockMessage = th.closest('.tovar_right')
    }
    $.ajax({
        url: th.attr('action'),
        type: 'POST',
        data: form,
        dataType: 'json',
        processData: false,
        contentType: false,
        success: function (data) {
            console.log(data)
            if ('url' in data) {
                window.location.href = data['url']
            }
            if ('amount' in data) {
                blockMessage.find('.err_log').show()
                blockMessage.find('.err_log').html(data['amount'])
            }
            if ('success' in data) {
                blockMessage.find('.err_log').hide()
                blockMessage.find('.succ_log').show()
                blockMessage.find('.succ_log').html('Товар успешно добавлен в корзину')
                if (data['busket']['size'] == $('.input_size').val()) {
                    btnBlock.empty()
                    btnBlock.html('<a href="/basket"><div class="put_tovar_button">Перейти в корзину</div></a>')
                }
                if ($('.input_size').length == 0) {
                    btnBlock.empty()
                    btnBlock.html('<a href="/basket"><div class="put_tovar_button">Перейти в корзину</div></a>')
                }
                if (th.closest('.tovar_right').length == 0) {
                    btnBlock.empty()
                    btnBlock.html('<div class="add_basket"><a href="/basket"><img class="img_add_basket" src="/img/icons/prodInBus.png" alt=""></a></div>')
                }
                setTimeout(function () {
                    blockMessage.find('.succ_log').empty()
                    blockMessage.find('.succ_log').hide()
                }, 5000)
            }
        },
        error: function (data) {
            console.log(data)
        }
    })
})
//
// переключение блоков на странице товара
$('.twoButton > button').click(function () {
    let buttons = $('.twoButton > button');
    $(buttons).removeClass('btn_not_active');
    $(buttons).removeClass('btn_active');
    $(buttons).addClass('btn_not_active');
    $(this).removeClass('btn_not_active');
    $(this).addClass('btn_active');
    $('.page_tovar_har').children().hide();
})
$('.button_visibleDesc').click(function () {
    $('.tovar_description').css({
        "display": "flex"
    });
})
$('.button_visibleHar').click(function () {
    $('.har').css({
        "display": "flex"
    });
})
$('.button_visibleRev').click(function () {
    $('.tovar_rev_block').css({
        "display": "flex"
    });
})
//

// размеры товара
if ($('.block_sizes').is(':visible')) {
    $('.block_sizes').children('.block_size').first().addClass('block_size_active');
    $('.input_size').val($('.block_size_active').text());
    $('.block_size').click(function () {
        $('.block_sizes').children('.block_size').removeClass('block_size_active');
        $(this).addClass('block_size_active');
        $('.input_size').val($('.block_size_active').text());
        checkedBusketUser()
    })
}

if ($('.tovar_right').is(':visible')) {
    $(document).ready(function () {
        checkedBusketUser()
    });
}
//
function checkedBusketUser() {
    $.ajax({
        type: "GET",
        url: "/basket/check",
        data: { size: $('.input_size').val(), id_product: $('.input_prod').val() },
        dataType: "json",
        success: function (data) {
            console.log(data)
            if (data[0] != null) {
                $('.tovar_right').find('.btn').empty()
                $('.tovar_right').find('.btn').html('<a href="/basket"><div class="put_tovar_button">Перейти в корзину</div></a>')
            } else {
                $('.tovar_right').find('.btn').empty()
                $('.tovar_right').find('.btn').html('<button name="add_basket" class="put_tovar_button">Добавить в корзину</button>')
            }
            if (data[1] != null) {
                $('#haracter_availability').html('В наличии (' + data[1]['amount'] + ') шт.')
                if (data[1]['amount'] == 0) {
                    $('#haracter_availability').css({ "color": "red" })
                    $('.btn').hide()
                    $('.put_plus_basket').hide()
                } else {
                    $('#haracter_availability').css({ "color": "#07C725;" })
                    $('.btn').show()
                    $('.put_plus_basket').css({ "display": "flex" })
                }
            }
        },
        error: function (data) {
            console.log(data)
        }
    });
}
// избранное (LocalStorage)

$(document).off('click', 'button[name="heart_tov"]').on('click', 'button[name="heart_tov"]', function (e) {
    e.preventDefault();
    // localStorage.clear('idArray')
    let blockMessage
    if ($(this).closest('.popular_tovar').length > 0) {
        blockMessage = $(this).closest('.popular_tovar')
    }
    if ($(this).closest('.tovar_right').length > 0) {
        blockMessage = $(this).closest('.tovar_right')
    }
    if ($(this).closest('.catalog_tovar').length > 0) {
        blockMessage = $(this).closest('.catalog_tovar')
    }
    blockMessage.find('.succ_log').empty()
    blockMessage.find('.succ_log').hide()
    blockMessage.find('.err_log').empty()
    blockMessage.find('.err_log').hide()
    let id = $(this).closest('form').find('input[name="id"]').val() || $(this).closest('form').find('input[name="prod"]').val()
    console.log(id)
    let oldItems = JSON.parse(localStorage.getItem('idArray')) || [];
    let i = 0;
    let int = 0;
    if (localStorage.getItem('idArray') != null) {
        for (i; i < oldItems.length; i++) {
            if (oldItems[i]['id'] == id) {

                blockMessage.find('.err_log').show()
                blockMessage.find('.err_log').html('Вы уже добавляли этот товар в избранное')
                setTimeout(function () {
                    blockMessage.find('.err_log').empty()
                    blockMessage.find('.err_log').hide()
                }, 5000)

                int = 1;
            }
        }
    }
    if (int == 0) {
        let newItem = {
            'id': id,
        };
        oldItems.push(newItem);
        localStorage.setItem('idArray', JSON.stringify(oldItems));

        blockMessage.find('.succ_log').show()
        blockMessage.find('.succ_log').html('Вы успешно добавили этот товар в избранное')
        setTimeout(function () {
            blockMessage.find('.succ_log').empty()
            blockMessage.find('.succ_log').hide()
        }, 5000)
    }
    uploadFav()
})

if ($('.favouritess').is(':visible')) {
    $(document).ready(function (e) {
        uploadFav()
    })
}
$(document).off('click', 'button[name="heart_tovar_delete"]').on('click', 'button[name="heart_tovar_delete"]', function (e) {
    e.preventDefault()
    let id = $(this).closest('form').find('input[name="id"]').val()
    let arr = localStorage.getItem('idArray')
    arr = JSON.parse(arr);
    let i = 0;
    let newArr = []
    for (i; i < arr.length; i++) {
        if (arr[i]['id'] != id) {
            newArr.push(arr[i])
        }
    }
    arr = JSON.stringify(newArr)
    localStorage.setItem('idArray', arr);
    $.ajax({
        url: "/favourites/delete/" + id + "",
        success: function (data) {
            uploadFav()
        },
        error: function (data) {
        }
    });
})

const uploadFav = () => {
    let arr = localStorage.getItem('idArray')
    arr = JSON.parse(arr);
    $.ajax({
        url: '/favourites/show',
        type: 'GET',
        data: { array: arr },
        success: function (data) {
            if ($('.favouritess').is(':visible')) {
                $('.catalog_tovars_two').empty()
                let i = 0;
                if (data.length > 0) {
                    for (i; i < data.length; i++) {
                        $('.catalog_tovars_two').append('<div class="catalog_tovar"><form class="img_heart_tovar"><button type="submit" class="button_heart_tovar" name="heart_tovar_delete"><img src="/img/icons/close_big.png" alt=""></button><input type="hidden" name="id" value="' + data[i]['id'] + '"></form><a href="/product/show/' + data[i]['id'] + '"><div class="img_popular_tovar"><picture><img src="/storage/' + data[i]['image'] + '" alt=""></picture></div></a><div class="about_popular_tovar"><a href="/product/show/' + data[i]['id'] + '"><p class="p_about_popular_tovar">' + data[i]['name'] + '</p></a><div class="price_popular_tovar"><div class="form_price_popular_tovar"><div class="price"><p class="p_price">' + data[i]['price'] + '</p></div><a href="/product/show/' + data[i]['id'] + '" class="add_basket"><img class="img_add_basket" src="/img/icons/busk.png" alt=""></a></div></div></div></div>')
                    }
                } else {
                    $('.catalog_top_h1 > h1').html('В избранном ничего нет')
                }
            }
        },
        error: function (data) {
            if ($('.favouritess').is(':visible')) {
                $('.catalog_top_h1 > h1').html('В избранном ничего нет')
            }
        }
    })
}
//

// Поиск по товарам
$(document).ready(function () {
    var $result = $('#search_box-result');

    $('#search').on('keyup', function (e) {
        searhFunction(this, e)
    });
    $('#search').on('click', function (e) {
        searhFunction(this, e)
    });
    const searhFunction = (This, e) => {
        var search = $(This).val();
        if ((search != '') && (search.length > 1)) {
            $.ajax({
                type: "GET",
                url: "/main/search",
                data: { 'search': search },
                success: function (data) {
                    // Вычисляем максимальную длину вложенных массивов
                    let maxInnerLength = Math.max(data['products'].length, data['category'].length, data['subcategory'].length, data['sub_subcategory'].length);
                    console.log(maxInnerLength)
                    // Проходимся по индексам от 0 до максимальной длины вложенных массивов
                    $result.empty()
                    for (let j = 0; j < maxInnerLength; j++) {
                        // Проверяем наличие элемента в каждом вложенном массиве на данной позиции
                        if (data['products'][j] !== undefined) {
                            $result.append('<div class="search_href_block"><a href="/product/show/' + data['products'][j]['id'] + '"><div class="search_result">' + data['products'][j]['name'] + ' - <span>Товар</span></div></a></div>')
                            console.log(1)
                        }
                        if (data['category'][j] !== undefined) {
                            $result.append('<div class="search_href_block"><a href="/catalog/' + data['category'][j]['id'] + '"><div class="search_result">' + data['category'][j]['name'] + ' - <span>Категория</span></div></a></div>')
                        }
                        if (data['subcategory'][j] !== undefined) {
                            $result.append('<div class="search_href_block"><a href="/catalog/' + data['subcategory'][j]['id_category'] + '/' + data['subcategory'][j]['id'] + '"><div class="search_result">' + data['subcategory'][j]['name'] + ' - <span>Категория</span></div></a></div>')
                        }
                        if (data['sub_subcategory'][j] !== undefined) {
                            $result.append('<div class="search_href_block"><a href="/catalog/' + data['sub_subcategory'][j]['id_category'] + '/' + data['sub_subcategory'][j]['id_sub_cat'] + '/' + data['sub_subcategory'][j]['id'] + '"><div class="search_result">' + data['sub_subcategory'][j]['name'] + ' - <span>Категория</span></div></a></div>')
                        }
                    }

                    if (data != '') {
                        $result.fadeIn();
                    } else {
                        $result.fadeOut(100);
                    }
                    $('#search_box-result').removeClass('search_overflow')
                    if ($('.search_href_block').is(':visible')) {
                        if ($('#search_box-result').height() >= 205) {
                            $('#search_box-result').addClass('search_overflow')
                        }
                    }
                }
            });
        } else {
            $result.html('');
            $result.fadeOut(100);
        }
    }

    $(document).on('click', function (e) {
        if (!$(e.target).closest('.search_box').length) {
            $result.html('');
            $result.fadeOut(100);
        }
    });

    $(document).on('click', '.search_result-name a', function () {
        $('#search').val($(this).text());
        $result.fadeOut(100);
        return false;
    });

    $(document).on('click', function (e) {
        if (!$(e.target).closest('.search_box').length) {
            $result.html('');
            $result.fadeOut(100);
        }
    });

    $('.pole_search').click(function () {
        if ($('#search').is(':focus')) {
            $('.presearch__overlay').show()
        }
    })

    $(document).on('click', function (e) {
        if (!$('#search').is(':focus')) {
            $('.presearch__overlay').hide()
        }
    });
});
//

//подсчет и вывод стоимости товаров
const showSumProducts = (This, e = false) => {
    if (e) {
        e.preventDefault();
    }
    const summ = $(This).parent().parent().children('.tovar_basket_total').children('.p_t-b-t');
    const price = $(This).children('input[name="price"]').val()
    const amount = $(This).children('input[name="amount"]').val()
    summ.html(price * amount);
}
$(document).on('change', ".put_plus_basket", function (e) {
    showSumProducts(this, e);
    sll()
})
$(document).on('click', ".put_plus_basket", function (e) {
    showSumProducts(this, e);
    sll()
})
function summProductsBasket() {
    let sum = $('.put_plus_basket');
    sum.map(function () {
        showSumProducts(this);
        sll()
    });
}
summProductsBasket()
//

// подсчет итоговой суммы в корзине:
function sll() {
    let array = $('.p_t-b-t').toArray().map(item => $(item).html());
    let itog = "";
    jQuery.each(array, function summ() {
        itog = Number(itog) + Number(this);
    });
    let nds = itog * 0.2;
    $('.itog_price > span').html(itog);
    $('.bottom_price-bot > span').html(itog);
    $('.summ_nds > span').html(parseInt(nds));
}
function summ_ready_basket() {
    let array = $('.p_t-b-t').toArray().map(item => $(item).html());
    let itog = "";
    jQuery.each(array, function summ() {
        itog = Number(itog) + Number(this);
    });
    let nds = itog * 0.2;
    $('.itog_price > span').html(itog);
    $('.bottom_price-bot > span').html(itog);
    $('.summ_nds > span').html(parseInt(nds));
}
//

// обновление колличества товаров в корзине
const updAmountProd = (This, e = false) => {
    if (e) {
        e.preventDefault();
    }
    let th = new FormData(This);
    let form = $(This);
    $.ajax({
        url: $(This).attr('action'),
        type: 'POST',
        data: th,
        dataType: 'json',
        processData: false,
        contentType: false,
        success: function (data) {
            if ('message' in data) {
                form.closest('.tovar_basket_kol-vo').find('.err_log').show()
                form.closest('.tovar_basket_kol-vo').find('.err_log').html(data['message'])
                setTimeout(function () {
                    $('.err_log').empty()
                    $('.err_log').hide()
                }, 10000)
                $(This).children('.amount').val(data['amount']);
                showSumProducts(This, e);
            }
        },
        error: function (data) {
        }
    })
}
if ($('.basket_all').is(':visible')) {
    $(document).on('change', ".put_plus_basket", function (e) {
        updAmountProd(this, e);
    })
    $(document).on('click', ".put_plus_basket", function (e) {
        updAmountProd(this, e);
    })
}
//

// получение и вывод корзины

if ($('.basket_paga').is(':visible')) {
    $(document).ready(function () {
        getBasketsProducts()
    });
    $(document).on('submit', '.btn_close', function (e) {
        e.preventDefault();
        let th = new FormData(this)
        $.ajax({
            url: $(this).attr('action'),
            type: 'POST',
            data: th,
            dataType: 'json',
            processData: false,
            contentType: false,
            success: function (data) {
                getBasketsProducts()
            },
            error: function (data) {
                getBasketsProducts()
            }
        });
    })
}
function getBasketsProducts() {
    let token = $('.form_promo').children('input[name="_token"]').val();
    $('.basket_paga').empty()
    $.ajax({
        type: "GET",
        url: "/basket/show",
        success: function (data) {
            if (data['baskets'].length > 0 && data['products'].length > 0) {
                let i = 0;
                for (i; i < data['baskets'].length; i++) {
                    $('.basket_paga').append('<div class="tovar_basket"><a href="/product/show/'+ data['products'][i]['id']+'"><div class="tovar_basket_img"><picture><img src="/storage/' + data['products'][i]['image'] + '" alt=""></picture></div></a><div id="' + data['baskets'][i]['id'] + '" class="tovar_basket_name"><div><h1>Артикул:</h1><p>' + data['products'][i]['article'] + '</p></div><a href="/product/show/'+ data['products'][i]['id']+'"><p>' + data['products'][i]['name'] + '</p></a></div><div class="tovar_basket_price"><p>' + data['products'][i]['price'] + '</p></div><div class="tovar_basket_kol-vo"><form action="/basket/update/' + data['baskets'][i]['id'] + '" method="POST" class="put_plus_basket"><input type="hidden" name="_token" value="' + token + '"><input type="hidden" name="_method" value="patch"><button type="submut" name="button_minus" class="put_button_minus update_btn">-</button><input type="hidden" name="price" value="' + data['products'][i]['price'] + '"><input type="hidden" name="id_product" value="' + data['products'][i]['id'] + '"><input type="hidden" name="size" value="' + data['baskets'][i]['size'] + '"><input type="text" class="amount" name="amount" value="' + data['baskets'][i]['amount'] + '"><button type="submut" name="button_plus" class="put_button_plus update_btn">+</button></form><div class="err_log"></div></div><div class="tovar_basket_total"><p class="p_t-b-t"></p></div><form class="btn_close" action="/basket/delete/' + data['baskets'][i]['id'] + '" method="POST"><input type="hidden" name="_token" value="' + token + '"><input type="hidden" name="_method" value="delete"><button type="submit" name="close"><img src="/img/icons/close_big.png" alt=""></button></form></div>')
                    if (data['baskets'][i]['size'] !== null) {
                        $('#' + data['baskets'][i]['id'] + '').append('<p>Размер: ' + data['baskets'][i]['size'] + '</p>')
                    }
                }
                summProductsBasket()
            } else {
                $('.basket_all').empty()
                $('.basket_all').html('<div class="basket_top"><h1>Ваша корзина пуста</h1></div>')
            }
        },
        error: function (data) {
            $('.basket_all').empty()
            $('.basket_all').html('<div class="basket_top"><h1>Ваша корзина пуста</h1></div>')
        }
    });
}
// Применение промокода
$(document).on('submit', '.form_promo', function (e) {
    e.preventDefault()
    let th = new FormData(this)
    $('#erconts').removeClass('succ_log')
    $('#erconts').removeClass('err_log')
    $.ajax({
        url: $(this).attr('action'),
        method: 'POST',
        data: th,
        dataType: 'json',
        processData: false,
        contentType: false,
        success: function (data) {
            if ('success' in data) {
                $('#erconts').addClass('succ_log')
                $('.succ_log').show()
                $('#erconts').html(data['success'])
                getBasketsProducts()
            } else {
                if ('double' in data) {
                    $('#erconts').addClass('err_log')
                    $('.err_log').show()
                    $('#erconts').html(data['double'])
                } else {
                    $('#erconts').addClass('err_log')
                    $('.err_log').show()
                    $('#erconts').html(data['error'])
                }
            }
        },
        error: function (data) {
            $('#erconts').addClass('err_log')
            $('.err_log').show()
            $('#erconts').html('Промокода не существует')
        },
    });
    setTimeout(function () {
        $('#erconts').empty()
        $('#erconts').removeClass('succ_log')
        $('#erconts').removeClass('err_log')
    }, 3000)
})


// отзывы
if ($('.page_tovar_all').is(':visible')) {
    let reviewsdata
    $.ajax({
        type: "GET",
        url: "/review/" + $('.input_prod').val() + "",
        success: function (data) {
            reviewsdata = data
            renderReviews(reviewsdata, 1)
        },
        error: function (data) {
        }
    });
    $(document).on('click', '.page-link', function (e) {
        e.preventDefault();
        const pageNum = $(this).data('page');
        renderReviews(reviewsdata, pageNum);
        $('html, body').scrollTop(700);
    });
}

function renderReviews(data, pageNum) {
    // Определить, какие отзывы нужно отображать на текущей странице
    const startIndex = (pageNum - 1) * 5;
    const endIndex = startIndex + 5;
    const reviewsToShow = data.reviews.slice(startIndex, endIndex);
    // Отобразить отзывы на странице
    $('.rev_block').empty();
    $('.tovar_rev_block').empty()
    $('.tovar_rev_block').append('<div class="rev_block"></div>')
    if (reviewsToShow.length > 0) {
        $('.tovar_rev_block').append('<div class="catalog_bottom"><ul class="pagination"></ul></div>')
        for (let i = 0; i < reviewsToShow.length; i++) {
            $('.rev_block').append('<div id="' + reviewsToShow[i]['id'] + '" class="tovar_rev"><div class="rev_header"><div class="rev_user_name">name surname</div><div class="rev_date">' + reviewsToShow[i]['date'] + '</div></div><div class="stars"></div><div class="rev_body"><div class="rev_plus"><div class="rev_title">Достоинства:</div><div class="rev_desc">' + reviewsToShow[i]['plus'] + '</div></div><div class="rev_minus"><div class="rev_title">Недостатки:</div><div class="rev_desc">' + reviewsToShow[i]['minus'] + '</div></div><div class="rev_comment"><div class="rev_title">Комментарий:</div><div class="rev_desc">' + reviewsToShow[i]['comment'] + '</div></div></div></div>');
            let stars = getStarRating(reviewsToShow[i]['estimation'])
            $('#' + reviewsToShow[i]['id'] + '').find('.stars').html(stars)
        }
    } else {
        $('.rev_block').append('<div style="text-align: center;">На данный товар нет отзывов</div>')
    }
    // Отобразить пагинацию
    renderPagination(data, pageNum, 5);
}

function renderPagination(data, currentPage, itemsPerPage) {
    let totalPages
    if (data.reviews != undefined) {
        totalPages = Math.ceil(data.reviews.length / itemsPerPage);
    } else {
        totalPages = Math.ceil(data.length / itemsPerPage);
    }
    const maxPagesToShow = 7; // количество кнопок с номерами страниц, которые нужно отобразить
    const firstPage = 1;
    const lastPage = totalPages;

    $('.pagination').empty();
    if(totalPages > 1){
    // кнопка в начало
    if (currentPage > 1) {
        const prevLink = `<li><a href="#" class="page-link" data-page="${firstPage}"><img src="/img/icons/Arrow_Left_2.png" alt=""></a></li>`;
        $('.pagination').append(prevLink);
    }

    // Кнопка назад
    if (currentPage > 1) {
        const prevLink = `<li><a href="#" class="page-link" data-page="${currentPage - 1}"><img src="/img/icons/Arrow_Left_one.png" alt=""></a></li>`;
        $('.pagination').append(prevLink);
    }

    // кнопки с номерами страниц
    let startPage, endPage;
    if (totalPages <= maxPagesToShow) {
        startPage = 1;
        endPage = totalPages;
    } else {
        const maxPagesBeforeCurrentPage = Math.floor(maxPagesToShow / 2);
        const maxPagesAfterCurrentPage = Math.ceil(maxPagesToShow / 2) - 1;
        if (currentPage <= maxPagesBeforeCurrentPage) {
            startPage = 1;
            endPage = maxPagesToShow;
        } else if (currentPage + maxPagesAfterCurrentPage >= totalPages) {
            startPage = totalPages - maxPagesToShow + 1;
            endPage = totalPages;
        } else {
            startPage = currentPage - maxPagesBeforeCurrentPage;
            endPage = currentPage + maxPagesAfterCurrentPage;
        }
    }

    for (let i = startPage; i <= endPage; i++) {
        const pageLink = `<li><a href="#" class="page-link ${i === currentPage ? 'active' : ''}" data-page="${i}">${i}</a></li>`;
        $('.pagination').append(pageLink);
    }

    //  кнопка вперед
    if (currentPage < totalPages) {
        const nextLink = `<li><a href="#" class="page-link" data-page="${currentPage + 1}"><img src="/img/icons/Arrow_Right_one.png" alt=""></i></a></li>`;
        $('.pagination').append(nextLink);
    }

    // кнопка в конец
    if (currentPage < totalPages) {
        const nextLink = `<li><a href="#" class="page-link" data-page="${lastPage}"><img src="/img/icons/Arrow_Right_2.png" alt=""></i></a></li>`;
        $('.pagination').append(nextLink);
    }
    }

}

function getStarRating(rating) {
    let stars = '';
    for (let i = 1; i <= 5; i++) {
        if (rating >= i) {
            stars += '<img src="/img/popular tovar/star_bacg.png" alt="">';
        } else {
            stars += '<img src="/img/popular tovar/star.png" alt="">';
        }
    }
    return stars;
}

// AJAX запрос на сервер для получения массива id товаров из таблицы favourites в БД
function updateLocalStorageFavourites() {
    $.ajax({
        url: '/favourites/get',
        method: 'GET',
        dataType: 'json',
        success: function (response) {
            // есть ли массив id товаров в localStorage
            var localStorageIdArray = localStorage.getItem('idArray');
            if (localStorageIdArray !== null) {
                localStorageIdArray = JSON.parse(localStorageIdArray);
            } else {
                localStorageIdArray = [];
            }
            if (response.length < localStorageIdArray.length) {
                uploadFav() // если в localstorage товаров больше, то обновляем таблицу избранного у этого пользователя
            }
           // Сравнить массивы и обновить localStorage при необходимости
            if (!arraysEqual(localStorageIdArray, response)) {
                localStorage.setItem('idArray', JSON.stringify(response));
                localStorageIdArray = response;
            }
        }
    });

    // Функция для сравнения двух массивов
    function arraysEqual(arr1, arr2) {
        if (arr1.length !== arr2.length) {
            return false;
        }
        for (var i = 0; i < arr1.length; i++) {
            if (arr1[i] !== arr2[i]) {
                return false;
            }
        }
        return true;
    }
}
export { updateLocalStorageFavourites };

if ($('.myreviews').is(':visible')) {
    let reviewData
    let sortingReviewData
    let pageNum = 1
    let parametr = 1
    let itemsPerPage = 5
    let totalPages
    $(document).ready(function () {
        getMyReviews()
    });

    $('.sorting .a-btn').click(function (e) {
        e.preventDefault();
        pageNum = 1
        parametr = $(this).data('status')
        sortingReviewData = sortingMyReviews(reviewData, parametr)
        renderMyReviws(sortingReviewData, 1)
        $('.a-btn').removeClass('active')
        $(this).addClass('active')
    });

    function getMyReviews() {
        $.ajax({
            type: "GET",
            url: "/my_reviews/get_reviews",
            success: function (data) {
                reviewData = data
                sortingReviewData = sortingMyReviews(data, parametr)
                totalPages = Math.ceil(sortingReviewData.length / itemsPerPage);
                if (pageNum > totalPages) {
                    pageNum = totalPages
                }
                renderMyReviws(sortingReviewData, pageNum)
            }
        });
    }

    function sortingMyReviews(data, parametr) {
        var result = [];
        $.each(data, function (index, element) {
            if (element.status == parametr) {
                result.push(element);
            }
        });
        return result;
    }

    function renderMyReviws(data, pageNum) {
        let reviews = data
        const token = $('.sorting').children('input').val()
        const startIndex = (pageNum - 1) * 5;
        const endIndex = startIndex + 5;
        const reviewsToShow = reviews.slice(startIndex, endIndex);
        $('.reviews_block').empty()
        if (reviewsToShow.length > 0) {
            for (let i = 0; i < reviewsToShow.length; i++) {
                $('.reviews_block').append('<div data-id="' + reviewsToShow[i]['id'] + '" class="my_reviews_block"><div class="my_review_header"><div class="about"><span>Отзыв на <a href="/product/show/' + reviewsToShow[i]['id_prod'] + '">' + reviewsToShow[i]['product'] + '</a> от ' + reviewsToShow[i]['date'] + '</span></div><div class="reviews_form"><form method="POST" action="" class="order_header_del_btn"><a href="/review/create/' + reviewsToShow[i]['id_prod'] + '" class="btn_upd_order">Изменить</a></form><form method="POST" action="/my_reviews/delete/' + reviewsToShow[i]['id'] + '" class="order_header_del_btn"><input type="hidden" name="_token" value="' + token + '"><input type="hidden" name="_method" value="delete"><input type="submit" name="del_review" class="btn_del_review" value="Удалить"></form></div></div></div>')
                if (reviewsToShow[i]['reason'] != null) {
                    $('.my_reviews_block[data-id="' + reviewsToShow[i]['id'] + '"]').append('<div class="my_review_body"><p>' + reviewsToShow[i]['reason'] + '</p></div>')
                }
            }
            $('.reviews_block').append('<div class="catalog_bottom"><ul class="pagination"></ul></div>')
            renderPagination(data, pageNum, itemsPerPage);
        } else {
            $('.reviews_block').append('<h1 style="margin-top:10px;">Ничего не найдено</h1>')
        }
    }
    $(document).on('click', '.page-link', function (e) {
        e.preventDefault();
        pageNum = $(this).data('page');
        renderMyReviws(sortingReviewData, pageNum);
        $('html, body').scrollTop(0);
    });
    $(document).on('click', '.btn_del_review', function (e) {
        e.preventDefault();
        let form = $(this).closest('form')
        let th = new FormData(this.closest('form'));
        $.ajax({
            type: "POST",
            url: form.attr('action'),
            data: th,
            dataType: 'json',
            processData: false,
            contentType: false,
            success: function (data) {
                console.log(data)
                getMyReviews()
            },
            error: function (data) {
                console.log(data)
            }
        });
    });

}

if($('.page_tovar_top').is(':visible')){
    $(document).ready(function () {
        $('.product-thumbnails').slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            arrows: true,
            dots: false,
            infinite: false,
            responsive: [{
                breakpoint: 768,
                settings: {
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 576,
                settings: {
                    slidesToShow: 2,
                }
            }
            ]
        });
        
        var slider = document.querySelector('.slick-list');
        slider.addEventListener('click', function(event) {
            // Если клик был не на слайдере, меняем изображение в главном блоке
            var mainImage = document.querySelector('.product-main-image img');
            var mainImageHref = document.querySelector('.product-main-image a');
            var thumbnailImage = event.target.closest('.thumbnail').querySelector('img');
            var mainImageSrc = mainImage.src;
            mainImage.src = thumbnailImage.src;
            mainImageHref.href = thumbnailImage.src;
            thumbnailImage.src = mainImageSrc;
            
            event.stopPropagation(); // Отменяем распространение события на родительские элементы
          
        });
        
        
        $('.product-main-image a').magnificPopup({
            type: 'image',
            gallery: {
                enabled: true,
                navigateByImgClick: true,
                preload: [0, 1]
            },
            image: {
                titleSrc: 'alt',
                width: '1000px'
            }
        });
    })
}