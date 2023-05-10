  @extends('admin.layouts.main')
  @section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Добавление категории</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            {{ Breadcrumbs::render('subcategory_2.create') }}
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
            <form action="{{route('admin.subcategory_2.store')}}" method="post">
              @csrf
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
              <div class="form-group">
                <label>Название подкатегории_2</label>
                <input type="text" class="form-control" name="name" value="{{old('name')}}" placeholder="Название подкатегории" required>
                @error('name')
                <div class="text-danger">{{ $message }}</div>
                @enderror
                @error('id_sub_cat')
                <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>
              <input type="submit" value="Добавить" class="btn btn-block btn-primary">
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