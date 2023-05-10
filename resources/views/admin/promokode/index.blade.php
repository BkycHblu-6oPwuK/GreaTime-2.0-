  @extends('admin.layouts.main')
  @section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Промокоды</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            {{ Breadcrumbs::render('promokode') }}
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
          <div class="col-2 mb-3"><a href="{{route('admin.promokode.create')}}" class="btn btn-block btn-primary">Добавить</a></div>
        </div>
        <div class="row sorting_buttons">
          {{-- <div class="col-2 mb-3"><a class="btn btn-block btn-primary search_sorting">В сборке</a></div>
          <div class="col-2 mb-3"><a class="btn btn-block btn-primary search_sorting">В пути</a></div>
          <div class="col-2 mb-3"><a class="btn btn-block btn-primary search_sorting">Готов к получению</a></div>
          <div class="col-2 mb-3"><a class="btn btn-block btn-primary search_sorting">Завершен</a></div>
          <div class="col-2 mb-3"><a class="btn btn-block btn-primary search_sorting">Отменен</a></div> --}}
        </div>
        <div class="row">
          <div class="col-12">
            <div class="card card_data_seach">
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Название</th>
                    <th>Процент скидки</th>
                    <th>Статус</th>
                    <th>Show</th>
                    <th>Update</th>
                    <th>Delete</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($promokodes as $promokode)
                    <tr>
                      <td>{{ $promokode->name }}</td>
                      <td>{{ $promokode->percent * 100 }}</td>
                      <td>{{ $promokode->status() }}</td>
                      <td><a class="btn btn-block btn-primary" href="{{route('admin.promokode.show',$promokode->id)}}">Перейти</a></td>
                      <td><a class="btn btn-block btn-primary" href="{{ route('admin.promokode.edit',$promokode->id) }}">Изменить</a></td>
                      <td>
                        <form action="{{ route('admin.promokodes.deletes',$promokode->id) }}" method="post">
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