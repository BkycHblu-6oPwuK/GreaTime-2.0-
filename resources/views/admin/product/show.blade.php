  @extends('admin.layouts.main')
  @section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><a href="{{ route('product.show',$product->id) }}">{{ $product->name }}</a></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">{{ Breadcrumbs::render('products.show',$product) }}</div>
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
                      <td class="align-middle">{{ $product->id }}</td>
                    </tr>
                    <tr>
                      <td class="align-middle">Название</td>
                      <td class="align-middle">{{ $product->name }}</td>
                    </tr>
                    <tr>
                      <td class="align-middle">Артикль</td>
                      <td class="align-middle">{{ $product->article }}</td>
                    </tr>
                    <tr>
                      <td class="align-middle">Категория</td>
                      <td class="align-middle">{{ $product->category->name }}</td>
                    </tr>
                    @if ($product->id_sub_cat != null)
                    <tr>
                      <td class="align-middle">Подкатегория</td>
                      <td class="align-middle">{{ $product->subcategory->name }}</td>
                    </tr>
                    @endif
                    @if ($product->id_sub_sub_cat != null)
                    <tr>
                      <td class="align-middle">Подкатегория_2</td>
                      <td class="align-middle">{{ $product->subSubcategory->name }}</td>
                    </tr>
                    @endif
                    <tr>
                      <td class="align-middle">Бренд</td>
                      <td class="align-middle">{{ $product->brand }}</td>
                    </tr>
                    <tr>
                      <td class="align-middle">Количество</td>
                      <td class="align-middle">{{ $product->amount }}</td>
                    </tr>
                    <tr>
                      <td class="align-middle">Цена</td>
                      <td class="align-middle">{{ $product->price }}</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="row col-12 ml-1 align-items-center">
              <div class="row mb-3 mr-3"><a class="btn btn-block btn-primary" href="{{ route('admin.product.edit',$product->id) }}">Изменить</a></div>
              <div class="row mb-3 mr-3"><a class="btn btn-block btn-primary" href="{{ route('admin.size.create',$product->id) }}">Добавить размеры</a></div>
              <div class="row mb-3 mr-3"><a class="btn btn-block btn-primary" href="{{ route('admin.characteristic.create',$product->id) }}">Добавить характеристики</a></div>
              <div class="row mb-3 mr-3">
                <form action="{{ route('admin.product.delete',$product->id) }}" method="post">
                  @csrf
                  @method('delete')
                  <input class="btn btn-block btn-primary" type="submit" value="Удалить">
                </form>
              </div>
              <div class="row mb-3"><a class="btn btn-block btn-primary" href="{{ route('admin.gallary.index',$product->id) }}">Галерея</a></div>
            </div>
          </div>
          @if ($product->sizesAll->count() > 0)
          <div class="col-4 mw-100 table_parent">
            <div class="card">
              <div class="card-body table-responsive p-0 mb-3">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>Выбрать</th>
                      <th>Размер</th>
                      <th>Количество</th>
                      <th colspan="2">Действие</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($product->sizesAll as $size)
                    <tr>
                      <td class="align-middle w-25">
                        <div class="custom-control custom-checkbox">
                          <input class="custom-control-input input_check_size" type="checkbox" id="{{ 'size'.$size->id }}" value="{{ $size->id }}">
                          <label for="{{ 'size'.$size->id }}" class="custom-control-label"></label>
                        </div>
                      </td>
                      <td class="align-middle">{{ $size->size }}</td>
                      <td class="align-middle">{{ $size->amount }}</td>
                      <td class="align-middle"><div class="row"><a class="btn btn-block btn-primary" href="/admin/products/sizes/edits?id={{ $size->id }}">Изменить</a></div></td>
                      <td>
                        <form action="{{route('admin.size.delete',$size->id)}}" method="post">
                          @csrf
                          @method('delete')
                          <input class="btn btn-block btn-primary" type="submit" value="Удалить">
                        </form>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                <div class="col-12"><div class="text-danger"></div></div>
              </div>
              <!-- /.card-body -->
            </div>
            <div class="row col-12 ml-1 align-items-center">
              <div class="row mr-3 mb-3">
                <input class="d-none" type="checkbox" id="allCheckSize">
                <label for="allCheckSize" class="btn btn-block btn-primary mb-0">Выбрать все</label>
              </div>
              <div class="row mr-3 mb-3"><a class="btn btn-block btn-primary upd_in_check upd_sizes">Изменить выбранные</a></div>
              <div class="row mb-3"><a class="btn btn-block btn-primary del_in_check del_sizes">Удалить выбранные</a></div>
            </div>
            <!-- /.card -->
          </div>
          @endif
          @if ($product->characteristic->count() > 0)
          <div class="col-5 mw-100 table_parent">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0 mb-3">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>Выбрать</th>
                      <th>Название</th>
                      <th>Значение</th>
                      <th colspan="2">Действие</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($product->characteristic as $key => $char)
                    <tr>
                      <td class="align-middle w-25">
                        <div class="custom-control custom-checkbox">
                          <input class="custom-control-input input_check_size" type="checkbox" id="{{ 'char'.$char->id }}" value="{{ $char->id }}">
                          <label for="{{ 'char'.$char->id }}" class="custom-control-label"></label>
                        </div>
                      </td>
                      <td class="align-middle">{{ $product->nameChar[$key]->name }}</td>
                      <td class="align-middle">{{ $char->value }}</td>
                      <td class="align-middle"><div class="row"><a class="btn btn-block btn-primary" href="/admin/products/characteristic/edits?id={{ $char->id }}">Изменить</a></div></td>
                      <td>
                        <form action="{{route('admin.characteristic.delete',$char->id)}}" method="post">
                          @csrf
                          @method('delete')
                          <input class="btn btn-block btn-primary" type="submit" value="Удалить">
                        </form>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                <div class="col-12"><div class="text-danger"></div></div>
              </div>
            </div>
            <div class="row col-12 ml-1 align-items-center">
              <div class="row mr-3 mb-3">
                <input class="d-none" type="checkbox" id="allCheckChar">
                <label for="allCheckChar" class="btn btn-block btn-primary mb-0">Выбрать все</label>
              </div>
              <div class="row mr-3 mb-3"><a class="btn btn-block btn-primary upd_in_check upd_chars">Изменить выбранные</a></div>
              <div class="row mb-3"><a class="btn btn-block btn-primary del_in_check del_chars">Удалить выбранные</a></div>
            </div>
          </div>
          @endif
        </div>
        <!-- /.row -->

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @endsection