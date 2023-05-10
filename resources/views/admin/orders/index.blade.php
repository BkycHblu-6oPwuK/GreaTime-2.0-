  @extends('admin.layouts.main')
  @section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Заказы</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            {{ Breadcrumbs::render('orders') }}
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row sorting_buttons">
          {{-- <div class="col-2 mb-3"><a class="btn btn-block btn-primary search_sorting">В сборке</a></div>
          <div class="col-2 mb-3"><a class="btn btn-block btn-primary search_sorting">В пути</a></div>
          <div class="col-2 mb-3"><a class="btn btn-block btn-primary search_sorting">Готов к получению</a></div>
          <div class="col-2 mb-3"><a class="btn btn-block btn-primary search_sorting">Завершен</a></div>
          <div class="col-2 mb-3"><a class="btn btn-block btn-primary search_sorting">Отменен</a></div> --}}
        </div>
        <div class="row">
          <div class="col-10">
            <div class="card card_data_seach">
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Номер</th>
                    <th>Дата</th>
                    <th>Статус заказа</th>
                    <th>Статус оплаты</th>
                    <th>Show</th>
                    {{-- <th>Delete</th> --}}
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($orders as $order)
                    <tr>
                      <td>{{ $order->id }}</td>
                      <td>{{ $order->getCreatedAtFormatted() }}</td>
                      <td>{{ $order->statusMyOrder() }}</td>
                      <td>{{ $order->statusPayment() }}</td>
                      <td><a class="btn btn-block btn-primary" href="{{route('admin.orders.show',$order->id)}}">Перейти</a></td>
                      {{-- <td>
                        <form action="{{ route('admin.product.delete',$order->id) }}" method="post">
                          @csrf
                          @method('delete')
                          <input class="btn btn-block btn-primary" type="submit" value="Удалить">
                        </form>
                      </td> --}}
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