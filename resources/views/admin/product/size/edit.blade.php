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
          {{ Breadcrumbs::render('products.size.edit',$product) }}
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
          <form action="{{ route('admin.sizes.update') }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="form-group add_sizes">
                @foreach ($sizes as $size)
                <div class="row align-items-end">
                    <div class="col-sm-4">
                        <input name="ids[]" class="form-control" value="{{ $size->id }}" type="hidden"required>
                      <span>Размер:</span>
                      <input name="sizes[]" class="form-control" value="{{ $size->size }}" type="number" step="any" required>
                    </div>
                    <div class="col-sm-4">
                      <span>Колличество:</span>
                      <input name="amounts[]" class="form-control" value="{{ $size->amount }}" type="number" required>
                    </div>
                </div>
                @endforeach
            </div>
            @error('sizes')
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