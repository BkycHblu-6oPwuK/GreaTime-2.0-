  @extends('admin.layouts.main')
  @section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">{{ 'Отзыв на - ' . $review->products->name }}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            {{ Breadcrumbs::render('reviews.show',$review) }}
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
     

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-9">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover table-bordered text-wrap">
                  <tbody>
                    <tr>
                      <td class="align-middle col-1">Плюсы</td>
                      <td class="align-middle">{{$review->plus}}</td>
                    </tr>
                    <tr>
                      <td class="align-middle col-1">Минусы</td>
                      <td class="align-middle">{{$review->minus}}</td>
                    </tr>
                    <tr>
                      <td class="align-middle col-1">Комментарий</td>
                      <td class="align-middle">{{$review->comment}}</td>
                    </tr>
                    <tr>
                      <td class="align-middle col-1">Статус отзыва</td>
                      <td class="align-middle">{{$review->status()}}</td>
                    </tr>
                    @if ($review->reason != null)
                    <tr>
                      <td class="align-middle col-1">Причина блокировки</td>
                      <td class="align-middle">{{$review->reason}}</td>
                    </tr>
                    @endif
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <div class="row">
          <div class="col-4">
            <form action="{{route('admin.reviews.update',$review->id)}}" method="post">
              @csrf
              @method('patch')
              <div class="form-group">
                <label>Статус</label>
                <select class="form-control select_status_review" name="status" required>
                    @if ($review->status != 1 && $review->status != 2)
                    <option {{ $review->status == 0 ? 'selected disabled' : 'value=0' }}>На рассмотрении</option>
                    @endif
                    <option {{ $review->status == 1 ? 'selected disabled' : 'value=1' }}>Одобрен</option>
                    <option {{ $review->status == 2 ? 'selected disabled' : 'value=2' }}>Заблокирован</option>
                </select>
                @error('status')
                <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group d-none">
                <label>Причина блокировки</label>
                <input type="text" class="form-control" name="reason" value="" placeholder="Причина блокировки">
                @error('reason')
                <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>
              <input type="submit" value="Применить" class="btn btn-block btn-primary col-4">
            </form>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @endsection