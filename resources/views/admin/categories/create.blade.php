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
            {{ Breadcrumbs::render('category.create') }}
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
            <form action="{{route('admin.category.store')}}" method="post">
              @csrf
              <div class="form-group">
                <label>Название категории</label>
                <input type="text" class="form-control" name="name" placeholder="Название категории">
                @error('name')
                  <div class="text-danger">Это поле обязательно для заполнения</div>
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