@extends('Admin.layout.app')

@section('title')
    Thêm mới banner
@endsection

@section('title-page')
    Banner
@endsection

@section('single-page')
    Thêm mới banner
@endsection

@section('content')
<div class="row m-4 vh-90">
    <div class="col-lg-12 mb-lg-0 mb-4">
      <div class="card z-index-2 h-100">
        <div class="card-header pb-0 pt-3 bg-transparent">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="container" style="width: 60%">
        <h2>Thêm mới banner</h2>
        <form method="POST" action="{{ route('banners.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="" class="form-label">Tiêu đề</label>
                <input type="text" name="title" class="form-control" id="">
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Ảnh banner</label>
                <input type="file" class="form-control" id="image" name="image">
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Nội dung</label>
                <textarea class="form-control" name="description" rows="6"></textarea>
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Ngày tạo</label>
                <input type="datetime-local" id="created_at" name="created_at" value="">
            </div>
            
            <button type="submit" class="btn btn-primary">Thêm mới</button>
            <a href="{{route('banners.index')}}" class="btn btn-success">Quay lại</a>
        </form>
    </div>
</div>
<div class="card-body p-3">
  <div class="chart">
    <canvas id="chart-line" class="chart-canvas" height="300"></canvas>
  </div>
</div>
</div>
</div>
</div>
@endsection

