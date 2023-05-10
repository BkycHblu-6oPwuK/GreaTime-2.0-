  @extends('admin.layouts.main')
  @section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Изменение продукта</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            {{ Breadcrumbs::render('products.edit',$product) }}
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
          <div class="col-6">
            <form action="{{ route('admin.product.update',$product->id) }}" method="post" enctype="multipart/form-data">
              @csrf
              @method('PATCH')
              <div class="form-group">
                <img class="w-50" src="{{ asset('storage/' . $product->image) }}" alt="">
              </div>
              <input type="hidden" name="old_name" value="{{ $product->name }}">
              <div class="form-group">
                <label>Название продукта</label>
                <input type="text" class="form-control" name="name" value="{{ $product->name }}" placeholder="Название продукта" required>
                @error('name')
                <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <label>Артикль продукта</label>
                <input type="text" class="form-control" name="article" value="{{ $product->article }}" placeholder="Артикль продукта" required>
                @error('article')
                <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <label>Количество продукта</label>
                <input type="number" class="form-control" name="amount" value="{{ $product->amount }}" placeholder="Количество продукта" required>
                @error('amount')
                <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <label>Цена продукта</label>
                <input type="number" step="any" class="form-control" name="price" value="{{ $product->price }}" placeholder="Цена продукта" required>
                @error('price')
                <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <label>Описание продукта</label>
                <textarea id="summernote" name="description" placeholder="Описание">{{ $product->description }}</textarea>
                @error('description')
                <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <label for="exampleInputFile">Изменить изображение</label>
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" name="image" id="exampleInputFile">
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
                      <option value="{{ $category->id }}" {{ $product->id_category == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('id_category')
                <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group subcategory">
                <label>Подкатегории</label>
                <select class="form-control subcategory_select" name="id_sub_cat">
                    <option selected disabled>Выберите подкатегорию</option>
                    <option value="">Без подкатегории</option>
                    @foreach ($product->category->subCategory as $subCat)
                      <option value="{{ $subCat->id }}" {{ $product->id_sub_cat == $subCat->id ? 'selected' : '' }}>{{ $subCat->name }}</option>
                    @endforeach
                </select>
              </div>
                @error('id_sub_cat')
                <div class="text-danger">{{ $message }}</div>
                @enderror
              <div class="form-group subcategory_2">
                <label>Подкатегории_2</label>
                <select class="form-control subcategory_2_select" name="id_sub_sub_cat">
                    <option selected disabled>Выберите подкатегорию</option>
                    <option value="">Без подкатегории</option>
                    @foreach ($product->category->subSubCategory($product->id_sub_cat) as $subCat)
                      <option value="{{ $subCat->id }}" {{ $product->id_sub_sub_cat == $subCat->id ? 'selected' : '' }}>{{ $subCat->name }}</option>
                    @endforeach
                </select>
              </div>
                @error('id_sub_sub_cat')
                <div class="text-danger">{{ $message }}</div>
                @enderror
              <div class="form-group group_select_brand">
                <label>Бренды</label>
                <select name="brand" class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" required>
                  <option data-select2-id="dis" selected disabled>Выберите бренд</option>
                  @for ($i = 0;$i < count($brands);$i++)
                    <option value="{{ $brands[$i] }}" {{ $product->brand == $brands[$i] ? 'selected' : '' }} data-select2-id="{{ $i }} {{ $i == 0 ? 'selected' : '' }}">{{ $brands[$i] }}</option> {{-- без комметариев --}}
                  @endfor
              </div>
              <div class="form-group"><input type="hidden" class="form-control"></div>
              @error('brand')
                <div style="margin-bottom: 4px;margin-top: -16px;" class="text-danger">{{ $message }}</div>
              @enderror
              <div class="form-group add_brand">
                <div class="btn_add_brand btn btn-block btn-primary w-25">Добавить бренд</div>
              </div>
              <div class="form-group">
                <input type="submit" value="Обновить" class="btn btn-block btn-primary w-25">
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