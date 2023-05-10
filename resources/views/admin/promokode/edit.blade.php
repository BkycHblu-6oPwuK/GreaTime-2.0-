  @extends('admin.layouts.main')
  @section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Изменение продукта</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            {{ Breadcrumbs::render('promokode.edit',$promokode) }}
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
            <form action="{{ route('admin.promokode.update',$promokode->id) }}" method="post" enctype="multipart/form-data">
              @csrf
              @method('PATCH')
              <div class="form-group">
                <label>Название промокода</label>
                <input type="text" class="form-control" name="name" value="{{$promokode->name}}" placeholder="Название промокода" required>
                @error('name')
                <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <label>Процент</label>
                <input type="number" class="form-control" name="percent" value="{{$promokode->percent * 100}}" placeholder="Процент" required>
                @error('percent')
                <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <label>Выберите статус</label>
                <select class="form-control" name="status" required>
                    <option value="0" {{ $promokode->status == 0 ? 'selected' : ' '}}>Не активен</option>
                    <option value="1" {{ $promokode->status == 1 ? 'selected' : ' '}}>Действующий</option>
                </select>
                @error('status')
                <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <input type="submit" value="Обновить" class="btn btn-block btn-primary w-25">
              </div>
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