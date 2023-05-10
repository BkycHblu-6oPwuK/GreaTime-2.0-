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
                        <form action="{{ route('admin.characteristic.store', $product->id) }}" method="post">
                            @csrf
                            <div class="form-group add_char">
                                <label>Выберите характеристики</label>
                                <select multiple="" name="name_chars[]" class="form-control mb-3 select_chars">
                                    @foreach ($nameChars as $char)
                                        <option value="{{ $char->name }}">{{ $char->name }}</option>
                                    @endforeach
                                </select>
                                @error('name_chars')
                                    <div style="margin-top:-15px" class="text-danger mb-3">{{ $message }}</div>
                                @enderror
                                <div class="btn_add_char btn btn-block btn-primary w-25">Далее</div>
                            </div>
                            <div class="form-group mt-4">
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
