// получение и отрисовка дочерних категорий

$('.category_select').change(function (e) {
    e.preventDefault()
    let id_category = $(this).val()
    $.ajax({
        type: "GET",
        url: "/admin/products/getCategory/" + id_category + "",
        success: function (data) {
            console.log(data)
            $('.subcategory').empty()
            $('.subcategory_2').empty()
            if (data.length > 0) {
                $('.subcategory').append('<label>Подкатегории</label>')
                $('.subcategory').append('<select class="form-control subcategory_select" name="id_sub_cat"></select>')
                $('.subcategory_select').append('<option selected disabled>Выберите подкатегорию</option>')
                if ($('.subcategory_2').is(':visible')) {
                    $('.subcategory_select').append('<option value="">Без подкатегории</option>')
                }
                for (let i = 0; i < data.length; i++) {
                    $('.subcategory_select').append('<option value="' + data[i]['id'] + '">' + data[i]['name'] + '</option>')
                }
            } else {
                $('.subcategory').append('<label>Подкатегорий не найдено</label>')
            }
        },
        error: function (data) {
            console.log(data)
        }
    });
})
$(document).off('change', '.subcategory_select').on('change', '.subcategory_select', function (e) {
    e.preventDefault()
    let id_category = $('.category_select').val()
    let id_subcategory = $(this).val()
    if (id_subcategory != 0) {
        $.ajax({
            type: "GET",
            url: "/admin/products/getCategory/" + id_category + "/" + id_subcategory + "",
            success: function (data) {
                console.log(data)
                $('.subcategory_2').empty()
                if (data.length > 0) {
                    $('.subcategory_2').append('<label>Подкатегории</label>')
                    $('.subcategory_2').append('<select class="form-control subcategory_2_select" name="id_sub_sub_cat"></select>')
                    $('.subcategory_2_select').append('<option selected disabled>Выберите подкатегорию</option>')
                    $('.subcategory_2_select').append('<option value="">Без подкатегории</option>')
                    for (let i = 0; i < data.length; i++) {
                        $('.subcategory_2_select').append('<option value="' + data[i]['id'] + '">' + data[i]['name'] + '</option>')
                    }
                } else {
                    $('.subcategory_2').append('<label>Подкатегорий не найдено</label>')
                }
            },
            error: function (data) {
                console.log(data)
            }
        });
    } else {
        $('.subcategory_2').empty()
    }
})
//
// бренды
$('.btn_add_brand').click(function (e) {
    $('.add_brand').empty()
    $('.add_brand').append('<input type="text" class="form-control" name="brand" placeholder="Введите название бренда" required>')
    $('.group_select_brand').hide()
})
//
// размеры

$(document).on('click', '.btn_add_size', function (e) {
    $('.add_sizes').empty()
    $('.add_sizes').append('<label>Выберите размеры</label>')
    $('.add_sizes').append('<select multiple="" name="sizes[]" class="form-control select_sizes mb-3"></select>')
    for (let i = 10; i <= 50; i += 0.5) {
        $('.select_sizes').append('<option value="' + i + '">' + i + '</option>')
    }
    $('.add_sizes').append('<div class="btn_add_size_amount btn btn-block btn-primary w-25">Далее</div>')
})

$(document).on('click', '.btn_add_size_amount', function () {
    let sizes = $('.select_sizes').val()
    let textInputOne = 'Размер:'
    let textInputTwo = 'Количество:'
    $('.add_sizes').empty()
    $('.add_sizes').append('<div class="btn_size_default btn btn-block btn-primary w-25 mt-3">Вернуться к выбору размеров</div>')
    if (sizes.length > 0) {
        for (let i = 0; i < sizes.length; i++) {
            $('.add_sizes').append('<div class="row align-items-end"><div class="col-sm-4"><span>' + textInputOne + '</span><input name="sizes[]" value="' + sizes[i] + '" class="form-control" type="number" step="any" required></div><div class="col-sm-4"><span>' + textInputTwo + '</span><input name="amounts[]" class="form-control" type="number" required></div><div class=""><div class="btn_del_size_amount btn btn-block btn-primary w-100">Удалить</div></div></div>')
        }
    } else {
        $('.add_sizes').append('<div class="row align-items-end"><div class="col-sm-4"><span>' + textInputOne + '</span><input name="sizes[]" class="form-control" type="number" step="any" required></div><div class="col-sm-4"><span>' + textInputTwo + '</span><input name="amounts[]" class="form-control" type="number" required></div><div class=""><div class="btn_del_size_amount btn btn-block btn-primary w-100">Удалить</div></div></div>')
    }
    $('.add_sizes').append('<div class="btn_add_size_personal btn btn-block btn-primary w-25 mt-3">Добавить свои размеры товару</div>')
})
$(document).on('click', '.btn_add_char', function () {
    let chars = $('.select_chars').val()
    let textInputOne = 'Название характеристики:'
    let textInputTwo = 'Значение:'
    $('.add_char').empty()
    if (chars.length > 0) {
        for (let i = 0; i < chars.length; i++) {
            $('.add_char').append('<div class="row align-items-end"><div class="col-sm-4"><span>' + textInputOne + '</span><input name="name_chars[]" class="form-control" type="text" value="' + chars[i] + '" required></div><div class="col-sm-4"><span>' + textInputTwo + '</span><input name="values[]" class="form-control" type="text" required></div><div class=""><div class="btn_del_size_amount btn btn-block btn-primary w-100">Удалить</div></div></div>')
        }
    } else {
        $('.add_char').append('<div class="row align-items-end"><div class="col-sm-4"><span>' + textInputOne + '</span><input name="name_chars[]" class="form-control" type="text" required></div><div class="col-sm-4"><span>' + textInputTwo + '</span><input name="values[]" class="form-control" type="text" required></div><div class=""><div class="btn_del_size_amount btn btn-block btn-primary w-100">Удалить</div></div></div>')
    }
    $('.add_char').append('<div class="btn_add_char_personal btn btn-block btn-primary w-25 mt-3">Добавить еще</div>')
})

$(document).on('click', '.btn_add_size_personal', function () {
    $(this).hide()
    let textInputOne = 'Размер:'
    let textInputTwo = 'Количество:'
    $('.add_sizes').append('<div class="row align-items-end"><div class="col-sm-4"><span>' + textInputOne + '</span><input name="sizes[]" class="form-control" type="number" step="any" required></div><div class="col-sm-4"><span>' + textInputTwo + '</span><input name="amounts[]" class="form-control" type="number" required></div><div class=""><div class="btn_del_size_amount btn btn-block btn-primary w-100">Удалить</div></div></div>')
    $('.add_sizes').append('<div class="btn_add_size_personal btn btn-block btn-primary w-25 mt-3">Добавить еще</div>')
})
$(document).on('click', '.btn_add_char_personal', function () {
    $(this).hide()
    let textInputOne = 'Название характеристики:'
    let textInputTwo = 'Значение:'
    $('.add_char').append('<div class="row align-items-end"><div class="col-sm-4"><span>' + textInputOne + '</span><input name="name_chars[]" class="form-control" type="text" required></div><div class="col-sm-4"><span>' + textInputTwo + '</span><input name="values[]" class="form-control" type="text" required></div><div class=""><div class="btn_del_size_amount btn btn-block btn-primary w-100">Удалить</div></div></div>')
    $('.add_char').append('<div class="btn_add_char_personal btn btn-block btn-primary w-25 mt-3">Добавить еще</div>')
})

$(document).on('click', '.btn_del_size_amount', function () {
    $(this).closest('.row').empty()
})
$(document).on('click', '.btn_size_default', function () {
    $('.add_sizes').empty()
    $('.add_sizes').append('<label>Выберите размеры</label>')
    $('.add_sizes').append('<select multiple="" name="sizes[]" class="form-control select_sizes mb-3"></select>')
    for (let i = 10; i <= 50; i += 0.5) {
        $('.select_sizes').append('<option value="' + i + '">' + i + '</option>')
    }
    $('.add_sizes').append('<div class="btn_add_size_amount btn btn-block btn-primary w-25">Далее</div>')
})

$('#allCheckSize').click(function (e) {
    allCheck($(this, e))
})

$('#allCheckChar').click(function (e) {
    allCheck($(this, e))
})
function allCheck(This, e) {
    let thisInput = $(This);
    let filtersInput = $(This).closest('.table_parent').find('.input_check_size');
    if ($(thisInput).is(':checked', true)) {
        $(filtersInput).prop('checked', true);
        thisInput.parent().children('label').css({ "background-color": "#207bdf" })
    } else {
        $(filtersInput).prop('checked', false);
        thisInput.parent().children('label').css({ "background-color": "#007bff" })
    }
}
$('.upd_in_check').click(function (e) {
    e.preventDefault()
    let values = getValuesIdSizes($(this))
    let url = null
    if ($(this).hasClass('upd_sizes')) {
        url = "/admin/products/sizes/edits"
    } else if ($(this).hasClass('upd_chars')) {
        console.log($(this))
        url = "/admin/products/characteristic/edits"
    }
    if (values.length > 0) {
        $('.text-danger').empty()
        $.ajax({
            type: "GET",
            url: url,
            data: { id: values },
            success: function (data, textStatus, jqXHR) {
                window.location.href = $(this)[0]['url'];
            }
        });
    } else {
        $(this).closest('.table_parent').find('.text-danger').html('Хотя бы одна должна быть выбрана')
    }
})
$('.del_in_check').click(function (e) {
    let values = getValuesIdSizes($(this))
    let url = null
    if ($(this).hasClass('del_sizes')) {
        url = "/admin/products/sizes/deletes"
    } else if ($(this).hasClass('del_chars')) {
        url = "/admin/products/characteristic/deletes"
    }
    if (values.length > 0) {
        $('.text-danger').empty()
        $.ajax({
            type: "GET",
            url: url,
            data: { id: values },
        });
    } else {
        $(this).closest('.table_parent').find('.text-danger').html('Хотя бы одна должна быть выбрана')
    }
})
function getValuesIdSizes(This) {
    let filtersInput = $(This).closest('.table_parent').find('.input_check_size');
    const values = [];
    filtersInput.each(function () {
        if ($(this).is(':checked', true)) {
            values.push($(this).val());
        }
    });
    return values;
}

$(document).on('click', '.search_sorting', function () {
    $('.search_sorting').removeClass('active')
    if ($('#example1_filter').find('.form-control-sm').val() == $(this).text()) {
        $('#example1_filter').find('.form-control-sm').val('').trigger('keyup')
    } else {
        $('#example1_filter').find('.form-control-sm').val($(this).text()).trigger('keyup')
        $(this).addClass('active')
    }
})
if ($('.card_data_seach').is(':visible')) {
    $(function () {
            $("#example1").DataTable({
            "responsive": true,
            "lengthChange": true,
            "autoWidth": false,
            "order": [[0, 'desc']],
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $(function() {
            var uniqueStatuses = []; // массив для уникальных статусов заказов
          
            $('#example1').DataTable().rows().nodes().each(function(node) {
              var td = $(node).find('td:nth-child(3)');
              var status;
          
              if (td.find('select').length) {
                // если в ячейке есть элемент select, получаем его значение
                status = td.find('select').val() || td.find('option:first').val();
              } else {
                // если в ячейке нет элемента select, получаем текст ячейки
                status = td.text().trim();
              }
          
              if (uniqueStatuses.indexOf(status) === -1) {
                // если статуса нет в массиве уникальных статусов, добавляем его туда
                uniqueStatuses.push(status);
              }
            });
            for(let i = 0;i < uniqueStatuses.length;i++){
                if(uniqueStatuses[i] == 'На рассмотрении'){
                    $('.sorting_buttons').append('<div class="col-2 mb-3"><a class="btn btn-block btn-primary search_sorting active">'+uniqueStatuses[i]+'</a></div>')
                } else {
                    $('.sorting_buttons').append('<div class="col-2 mb-3"><a class="btn btn-block btn-primary search_sorting">'+uniqueStatuses[i]+'</a></div>')
                }
            }
            if($('.search_sorting').hasClass('active')){
                $('#example1_filter').find('.form-control-sm').val($('.sorting_buttons .active').text()).trigger('keyup')
            }
          });
          
    });
}

$('.status_select').change(function (e) { 
    let val = $(this).val()
    $.ajax({
        type: "GET",
        url: "/admin/orders/update/"+$(this).data('id')+"",
        data: {status:val},
        dataType: "json",
        success: function (data) {
            location.reload();
        }
    });
})

$('.select_status_review').change(function(){
    if($(this).val() == "2"){
        $('input[name="reason"]').closest('.form-group').removeClass('d-none')
    } else {
        $('input[name="reason"]').closest('.form-group').addClass('d-none')
    }
})

$('.select_category_products').change(function(e){
    let id = $(this).val()
    $.ajax({
        type: "GET",
        url: "/admin/promokode/getProducts/"+id+"",
        success: function (data) {
            $('.form-products').empty()
            if(data.length > 0){
                $('.form-products').append('<label>Выберите товары</label>')
                $('.form-products').append('<select multiple="" name="products[]" class="form-control select_products"></select>')
                for(let i = 0;i < data.length;i++){
                    $('.select_products').append('<option value="'+data[i]['id']+'">'+data[i]['name']+'</option>')
                }
            } else {
                $('.form-products').append('<label>Товаров не найдено</label>')
            }
        }
    });
})

$('.card-header select').change(function(){
    if($(this).val() == ''){
        $('#example1_filter').find('.form-control-sm').val('').trigger('keyup')
    } else {
        if ($('#example1_filter').find('.form-control-sm').val() == $(this).val()) {
            $('#example1_filter').find('.form-control-sm').val('').trigger('keyup')
        } else {
            $('#example1_filter').find('.form-control-sm').val($(this).val()).trigger('keyup')
        }
    }
})