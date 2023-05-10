  @extends('admin.layouts.main')
  @section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Добавление промокода</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            {{ Breadcrumbs::render('promokode.create') }}
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
            <form action="{{route('admin.promokode.store')}}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                <label>Название промокода</label>
                <input type="text" class="form-control" name="name" value="{{old('name')}}" placeholder="Название промокода" required>
                @error('name')
                <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <label>Процент</label>
                <input type="number" class="form-control" name="percent" value="{{old('percent')}}" placeholder="Процент" required>
                @error('percent')
                <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <label>Выберите категорию товаров</label>
                <select class="form-control select_category_products" name="id_category" required>
                    <option selected disabled>Выберите категорию</option>
                    @foreach ($categories as $category)
                      <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
              </div>
              <div class="form-group form-products">
                {{-- <label>Выберите товары</label>
                <select multiple="" name="products[]" class="form-control">
                  <option value=""></option>
                </select> --}}
                @error('products')
                <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <input type="submit" value="Добавить промокод" class="btn btn-block btn-primary w-25">
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