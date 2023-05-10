  @extends('admin.layouts.main')
  @section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Подкатегории</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            {{ Breadcrumbs::render('subcategory') }}
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
          <div class="col-2 mb-3"><a href="{{route('admin.subcategory.create')}}" class="btn btn-block btn-primary">Добавить</a></div>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Родительская категория</th>
                      <th>Название</th>
                      <th>Продуктов</th>
                      <th colspan="3">Действия</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($categories as $category)
                    <tr>
                      <td class="align-middle">{{$category->id}}</td>
                      <td class="align-middle">{{$category->category->name}}</td>
                      <td class="align-middle">{{$category->name}}</td>
                      <td class="align-middle">{{$category->allProducts->count()}}</td>
                      <td><a class="btn btn-block btn-primary" href="{{route('admin.subcategory.show',$category->id)}}">Перейти</a></td>
                      <td><a class="btn btn-block btn-primary" href="{{route('admin.subcategory.edit',$category->id)}}">Изменить</a></td>
                      <td>
                        <form action="{{route('admin.subcategory.delete',$category->id)}}" method="post">
                          @csrf
                          @method('delete')
                          <input class="btn btn-block btn-primary" {{ $category->allProducts->count() > 0 ? 'disabled' : '' }} type="submit" value="Удалить">
                        </form>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @endsection