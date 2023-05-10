  @extends('admin.layouts.main')
  @section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">{{ 'Заказ - ' . $order->id . ', от ' . $order->getCreatedAtFormatted() }}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            {{ Breadcrumbs::render('orders.show',$order) }}
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
     

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row flex-wrap">
          <div class="col-5 mw-100">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0 mb-3">
                <table class="table table-hover text-nowrap">
                  <tbody>
                    <tr>
                      <td class="align-middle">ID</td>
                      <td class="align-middle">{{ $order->id }}</td>
                    </tr>
                    <tr>
                      <td class="align-middle">Метод доставки</td>
                      <td class="align-middle">{{ $order->shipping_methods }}</td>
                    </tr>
                    <tr>
                      <td class="align-middle">Имя</td>
                      <td class="align-middle">{{ $order->name }}</td>
                    </tr>
                    <tr>
                      <td class="align-middle">Фамилия</td>
                      <td class="align-middle">{{ $order->surname }}</td>
                    </tr>
                    <tr>
                      <td class="align-middle">Номер телефона</td>
                      <td class="align-middle">{{ $order->telephone }}</td>
                    </tr>
                    <tr>
                      <td class="align-middle">Email</td>
                      <td class="align-middle">{{ $order->email }}</td>
                    </tr>
                    <tr>
                      <td class="align-middle">Метод оплаты</td>
                      <td class="align-middle">{{ $order->payment_method }}</td>
                    </tr>
                    <tr>
                      <td class="align-middle">Статус заказа</td>
                      <td class="align-middle">
                        @if ($order->status < 3)
                          <div class="form-group">
                            <select class="form-control status_select" data-id="{{ $order->id }}" name="status" required="">
                              @switch ($order->status)
                                @case(1)
                                      <option disabled selected>В пути</option>
                                      <option value="2">Готов к получению</option>
                                      <option value="3">Завершен</option>
                                      <option value="4">Отменен</option>
                                    @break
                                @case(2)
                                      <option disabled selected>Готов к получению</option>
                                      <option value="3">Завершен</option>
                                      <option value="4">Отменен</option>
                                    @break
                                @default
                                      <option disabled selected>В сборке</option>
                                      <option value="1">В пути</option>
                                      <option value="2">Готов к получению</option>
                                      <option value="3">Завершен</option>
                                      <option value="4">Отменен</option>
                                    @break
                              @endswitch
                            </select>
                          </div>
                        @else
                          {{ $order->statusMyOrder() }}
                        @endif
                      </td>
                    </tr>
                    <tr>
                      <td class="align-middle">Итоговая цена</td>
                      <td class="align-middle">{{ $order->price_itog }}</td>
                    </tr>
                    @if ($order->street != null)
                    <tr>
                      <td class="align-middle">Улица</td>
                      <td class="align-middle">{{ $order->street }}</td>
                    </tr>
                    <tr>
                      <td class="align-middle">Дом</td>
                      <td class="align-middle">{{ $order->home }}</td>
                    </tr>
                    <tr>
                      <td class="align-middle">Подъезд</td>
                      <td class="align-middle">{{ $order->entrance }}</td>
                    </tr>
                    <tr>
                      <td class="align-middle">Квартира</td>
                      <td class="align-middle">{{ $order->flat }}</td>
                    </tr>
                    @endif
                    <tr>
                      <td class="align-middle">Статус оплаты</td>
                      <td class="align-middle">{{ $order->statusPayment() }}</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="row col-12 ml-1 align-items-center">
              {{-- <div class="row mb-3 mr-3">
                <form action="" method="post">
                  @csrf
                  @method('delete')
                  <input class="btn btn-block btn-primary" type="submit" value="Удалить">
                </form>
              </div> --}}
            </div>
          </div>
          <div class="col-5 mw-100">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-bordered text-nowrap">
                  <thead>
                    <tr>
                      <th>Продукт</th>
                      <th>Размер</th>
                      <th>Количество</th>
                      <th>Цена</th>
                      <th>Итоговая стоимость</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($order->orderList as $ordlist)
                    <tr>
                      <td class="align-middle w-25"><a href="{{ route('admin.product.show',$ordlist->products->id) }}">{{ $ordlist->products->name }}</a></td>
                      <td class="align-middle">{{ $ordlist->size > 0 ? $ordlist->size : '-' }}</td>
                      <td class="align-middle">{{ $ordlist->amount }}</td>
                      <td class="align-middle">{{ $ordlist->priceInSalePromokode() }}</td>
                      <td class="align-middle">{{ $ordlist->priceInSalePromokode() * $ordlist->amount }}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
            {{-- <div class="row col-12 ml-1 align-items-center">
              <div class="row mb-3 mr-3">
                <form action="" method="post">
                  @csrf
                  @method('delete')
                  <input class="btn btn-block btn-primary" type="submit" value="Удалить">
                </form>
              </div>
            </div> --}}
          </div>
        </div>
        <!-- /.row -->

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @endsection