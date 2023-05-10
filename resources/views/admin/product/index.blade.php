  @extends('admin.layouts.main')
  @section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Продукты</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            {{ Breadcrumbs::render('products') }}
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
          <div class="col-2 mb-3"><a href="{{route('admin.product.create')}}" class="btn btn-block btn-primary">Добавить</a></div>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="card card_data_seach">
              <div class="card-header">
                  <select class="form-control w-25" name="category" required>
                    <option value="">Выберите категорию</option>
                    @foreach ($categories as $cat)
                    <option value="{{ $cat->name }}">{{ $cat->name }}</option>
                    @endforeach
                  </select>
              </div>
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Id</th>
                    <th>Артикль</th>
                    <th>Название</th>
                    <th>Категория</th>
                    <th>Show</th>
                    <th>Update</th>
                    <th>Delete</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($products as $product)
                    <tr>
                      <td>{{ $product->id }}</td>
                      <td>{{ $product->article }}</td>
                      <td>{{ $product->name }}</td>
                      <td>{{ $product->category->name }}</td>
                      <td><a class="btn btn-block btn-primary" href="{{route('admin.product.show',$product->id)}}">Перейти</a></td>
                      <td><a class="btn btn-block btn-primary" href="{{ route('admin.product.edit',$product->id) }}">Изменить</a></td>
                      <td>
                        <form action="{{ route('admin.product.delete',$product->id) }}" method="post">
                          @csrf
                          @method('delete')
                          <input class="btn btn-block btn-primary" type="submit" value="Удалить">
                        </form>
                      </td>
                    </tr>
                    @endforeach
                  </tfoot>
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