@extends('admin.layouts.main')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Добавление</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          {{ Breadcrumbs::render('products.char.create',$product) }}
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
        <div class="col-7">
          <form action="{{ route('admin.size.store',$product->id) }}" method="post">
            @csrf
            <div class="form-group add_sizes">
                <div class="row align-items-end">
                    <div class="col-sm-4">
                      <span>Размер:</span>
                      <input name="sizes[]" class="form-control" value="" type="number" step="any" required>
                    </div>
                    <div class="col-sm-4">
                      <span>Колличество:</span>
                      <input name="amounts[]" class="form-control" value="" type="number" required>
                    </div>
                </div>
                <div class="btn_add_size_personal btn btn-block btn-primary w-25 mt-3">Добавить еще</div>
            </div>
            @error('sizes')
              <div style="margin-bottom: 4px;margin-top: -16px;" class="text-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
              <input type="submit" value="Добавить" class="btn btn-block btn-primary w-25">
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