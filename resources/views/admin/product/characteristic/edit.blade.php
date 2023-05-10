@extends('admin.layouts.main')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Изменение</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          {{ Breadcrumbs::render('products.char.edit',$product) }}
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
          <form action="{{ route('admin.characteristics.update') }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="form-group add_sizes">
                @foreach ($chars as $char)
                <div class="row align-items-end">
                    <div class="col-sm-4">
                      <input name="ids[]" class="form-control" value="{{ $char->id }}" type="hidden"required>
                      <span>Характеристика:</span>
                      <input name="name_chars[]" class="form-control" value="{{ $char->nameChar->name }}" type="text" required>
                    </div>
                    <div class="col-sm-4">
                      <span>Значение:</span>
                      <input name="values[]" class="form-control" value="{{ $char->value }}" type="text" required>
                    </div>
                </div>
                @endforeach
            </div>
            @error('name_chars')
              <div style="margin-bottom: 4px;margin-top: -16px;" class="text-danger">{{ $message }}</div>
            @enderror
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