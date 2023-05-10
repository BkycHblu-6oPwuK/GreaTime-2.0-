  @extends('admin.layouts.main')
  @section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Добавление продукта</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            {{ Breadcrumbs::render('products.create') }}
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-8">
            <form action="{{route('admin.product.store')}}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                <label>Название продукта</label>
                <input type="text" class="form-control" name="name" value="{{old('name')}}" placeholder="Название продукта" required>
                @error('name')
                <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <label>Артикль продукта</label>
                <input type="text" class="form-control" name="article" value="{{old('article')}}" placeholder="Артикль продукта" required>
                @error('article')
                <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <label>Количество продукта</label>
                <input type="number" class="form-control" name="amount" value="{{old('amount')}}" placeholder="Количество продукта" required>
                @error('amount')
                <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <label>Цена продукта</label>
                <input type="number" step="any" class="form-control" name="price" value="{{old('price')}}" placeholder="Цена продукта" required>
                @error('price')
                <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <label>Описание продукта</label>
                <textarea id="summernote" name="description" placeholder="Описание">{{old('description')}}</textarea>
                @error('description')
                <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <label for="exampleInputFile">Добавить изображение</label>
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" name="image" id="exampleInputFile" required>
                    <label class="custom-file-label" for="exampleInputFile">Выберите изображение</label>
                  </div>
                  <div class="input-group-append">
                    <span class="input-group-text">Загрузка</span>
                  </div>
                </div>
                @error('image')
                <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <label>Категории</label>
                <select class="form-control category_select" name="id_category" required>
                    <option selected disabled>Выберите категорию</option>
                    @foreach ($categories as $category)
                      <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('id_category')
                <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group subcategory">
                {{-- <label>Подкатегории</label>
                <select class="form-control subcategory_select" name="id_sub_cat">
                    <option selected disabled>Выберите подкатегорию</option>
                    <option value="1">2</option>
                </select> --}}
              </div>
                @error('id_sub_cat')
                <div class="text-danger">{{ $message }}</div>
                @enderror
              <div class="form-group subcategory_2">
                {{-- <label>Подкатегории_2</label>
                <select class="form-control subcategory_2_select" name="id_sub_sub_cat">
                    <option selected disabled>Выберите подкатегорию</option>
                    <option value="1">2</option>
                </select> --}}
              </div>
                @error('id_sub_sub_cat')
                <div class="text-danger">{{ $message }}</div>
                @enderror
              <div class="form-group group_select_brand">
                <label>Бренды</label>
                <select name="brand" class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" required>
                  <option data-select2-id="dis" selected disabled>Выберите бренд</option>
                  @for ($i = 0;$i < count($brands);$i++)
                    <option value="{{ $brands[$i] }}" data-select2-id="{{ $i }} {{ $i == 0 ? 'selected' : '' }}">{{ $brands[$i] }}</option>
                  @endfor
              </div>
              <div class="form-group"><input type="hidden" class="form-control"></div>
              @error('brand')
                <div style="margin-bottom: 4px;margin-top: -16px;" class="text-danger">{{ $message }}</div>
              @enderror
              <div class="form-group add_brand">
                <div class="btn_add_brand btn btn-block btn-primary w-25">Добавить бренд</div>
              </div>
                <div class="form-group add_sizes">
                  <div class="btn_add_size btn btn-block btn-primary w-25">Добавить размеры товару</div>
                  {{-- <label>Выберите размеры</label>
                  <select multiple="" name="sizes[]" class="form-control">
                    <option value=""></option>
                  </select> --}}
                  {{--
                      <div class="btn_add_size_personal btn btn-block btn-primary w-25">Добавить свои размеры товару</div>
                      <div class="btn_size_default btn btn-block btn-primary w-25 mt-3">Вернуться к выбору размеров</div>
                  <div class="btn_add_size_amount btn btn-block btn-primary w-50">Добавить колличество товарам с размером</div>
                   --}}
                  {{-- <div class="row align-items-end">
                    <div class="col-sm-4">
                      <span>Размер:</span>
                      <input name="sizes[]" class="form-control" type="text" value="38" required>
                    </div>
                    <div class="col-sm-4">
                      <span>Колличество:</span>
                      <input name="amount[]" class="form-control" type="text" value="3" required>
                    </div>
                    <div class="col-sm-4">
                      <div class="btn_del_size_amount btn btn-block btn-primary w-25">Удалить</div>
                    </div>
                  </div> --}}
                </div>
                @error('sizes')
                <div style="margin-bottom: 4px;margin-top: -16px;" class="text-danger">{{ $message }}</div>
              @enderror
              @error('amount')
              <div style="margin-bottom: 4px;margin-top: -16px;" class="text-danger">{{ $message }}</div>
            @enderror
              <div class="form-group">
                <input type="submit" value="Добавить продукт" class="btn btn-block btn-primary w-25">
              </div>
            </form>
          </div>
        </div>
        <!-- /.row -->

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @endsection