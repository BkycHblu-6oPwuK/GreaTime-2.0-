@extends('admin.layouts.main')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Галерея для - {{ $product->name }}</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          {{ Breadcrumbs::render('gallary.index',$product) }}
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
        <div class="col-2 mb-3"><a href="{{route('admin.gallary.create',$product->id)}}" class="btn btn-block btn-primary">Добавить</a></div>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="card card-primary">
            <div class="card-body">
              <div class="row align-items-center">
                @foreach ($gallary as $gal)
                <div class="col-4 d-flex justify-content-center mb-3 p-3">
                  <a href="{{ asset('storage/' . $gal->image) }}" data-toggle="lightbox" data-title="Изображение - {{ $gal->id }}" data-gallery="gallery">
                    <img src="{{ asset('storage/' . $gal->image) }}" class="img-fluid mb-2 img_320"/>
                  </a>
                  <div class="position-absolute fixed-top">
                    <form action="{{ route('admin.gallary.delete',['product' => $product->id,'gallary' => $gal->id]) }}" method="post">
                      @csrf
                      @method('delete')
                      <button type="submit" class="btn btn-block btn-outline-primary"><i class="fas fa-times"></i></button>
                    </form>
                  </div>
                </div>
                @endforeach
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /.row -->

    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection