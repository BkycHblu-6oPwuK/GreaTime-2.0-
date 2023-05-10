  @extends('admin.layouts.main')
  @section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">{{ 'Промокод - ' . $promokode->name }}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">{{ Breadcrumbs::render('promokode.show',$promokode) }}</div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
     

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row flex-wrap">
          <div class="col-4 mw-100">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0 mb-3">
                <table class="table table-hover text-nowrap">
                  <tbody>
                    <tr>
                      <td class="align-middle">Название</td>
                      <td class="align-middle">{{ $promokode->name }}</td>
                    </tr>
                    <tr>
                      <td class="align-middle">Процент</td>
                      <td class="align-middle">{{ $promokode->percent * 100 }}</td>
                    </tr>
                    <tr>
                      <td class="align-middle">Cтатус</td>
                      <td class="align-middle">{{ $promokode->status() }}</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="row col-12 ml-1 align-items-center">
              <div class="row mb-3 mr-3"><a class="btn btn-block btn-primary" href="{{ route('admin.promokode.edit',$promokode->id) }}">Изменить</a></div>
              <div class="row mb-3 mr-3">
                <form action="{{ route('admin.promokodes.deletes',$promokode->id) }}" method="post">
                  @csrf
                  @method('delete')
                  <input class="btn btn-block btn-primary" type="submit" value="Удалить">
                </form>
              </div>
            </div>
          </div>
          <div class="col-5 mw-100">
            <div class="card">
              <div class="card-body table-responsive p-0 mb-3">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>Товар</th>
                      <th>Действие</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($promokode->products() as $product)
                    <tr>
                      <td class="align-middle"><a href="{{ route('admin.product.show',$product->id) }}">{{ $product->name }}</a></td>
                      <td>
                        <form action="{{route('admin.promokode.product.delete',['promokode' => $promokode->id,'product' => $product->id])}}" method="post">
                          @csrf
                          @method('delete')
                          <input class="btn btn-block btn-primary" type="submit" value="Удалить">
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