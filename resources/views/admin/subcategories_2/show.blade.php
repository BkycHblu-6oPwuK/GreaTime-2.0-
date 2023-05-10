  @extends('admin.layouts.main')
  @section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">{{$subcategory_2->name}}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            {{ Breadcrumbs::render('subcategory_2.show',$subcategory_2) }}
          </div>
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
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0 mb-3">
                <table class="table table-hover text-nowrap">
                  <tbody>
                    <tr>
                      <td class="align-middle">ID</td>
                      <td class="align-middle">{{$subcategory_2->id}}</td>
                    </tr>
                    <tr>
                      <td class="align-middle">Родительской категория</td>
                      <td class="align-middle">{{$subcategory_2->category->name}}</td>
                    </tr>
                    <tr>
                      <td class="align-middle">Родительской подкатегория</td>
                      <td class="align-middle">{{$subcategory_2->subCategory->name}}</td>
                    </tr>
                    <tr>
                      <td class="align-middle">Название</td>
                      <td class="align-middle">{{$subcategory_2->name}}</td>
                    </tr>
                    <tr>
                      <td class="align-middle">Продуктов</td>
                      <td class="align-middle">{{$subcategory_2->allProducts->count()}}</td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <div class="row col-6">
          @if ($subcategory_2->allProducts->count() > 0)
            <div class="row col-3 mb-3 mr-3"><a class="btn btn-block btn-primary" href="{{route('admin.product.subcategory_2.index',$subcategory_2->id)}}">Показать продукты</a></div>
          @endif
          <div class="row col-3 mb-3 mr-3"><a class="btn btn-block btn-primary" href="{{route('admin.subcategory_2.edit',$subcategory_2->id)}}">Изменить</a></div>
          <div class="row col-2">
            <form action="{{route('admin.subcategory_2.delete',$subcategory_2->id)}}" method="post">
              @csrf
              @method('delete')
              <input class="btn btn-block btn-primary" {{ $subcategory_2->allProducts->count() > 0 ? 'disabled' : '' }} type="submit" value="Удалить">
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