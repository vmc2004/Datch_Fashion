@extends('Admin.layout.app')

@section('title')
    Cập nhật banner
@endsection

@section('title-page')
    Banner
@endsection

@section('single-page')
    Cập nhật banner
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

    <div class="container" >
        <h2 class="text-center">Tạo banner mới</h2>
        <form method="POST" action="{{ route('banners.update',$banner) }}" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="" class="form-label">Tiêu đề</label>
                <input type="text" name="title" class="form-control" id="" value="{{$banner->title}}">
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Ảnh banner</label>
                <input type="file" class="form-control" id="image" name="image" value="{{$banner->image}}">
                <img src="{{asset($banner->image)}}" alt="" width="200px">
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Đường dẫn</label>
                <input type="text" class="form-control" id="link" name="link" value="{{$banner->link}}">
            </div>
            
            <div class="d-flex">
                <div class="mb-3 me-4">
                    <label class="form-label">Home</label>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" name="location">
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Active</label>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" name="is_active">
                    </div>
                </div>
            </div>
            
            

           
            
            <button type="submit" class="btn btn-primary">Lưu</button>
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

