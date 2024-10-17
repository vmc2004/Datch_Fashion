@extends('Admin.layout.app')

@section('title')
    Thêm mới màu sắc
@endsection

@section('title-page')
    Màu sắc
@endsection

@section('single-page')
    Thêm mới màu sắc
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
                        <h2>Thêm mới màu sắc</h2>
                        <form method="POST" action="{{ route('colors.create') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label for="" class="form-label">Tên màu:</label>
                                <input type="text" name="name" class="form-control" id="">
                            </div>

                            <div class="mb-3">
                                <label for="" class="form-label">Mã màu:</label>
                                <input type="color" name="color_code" class="form-control" id="">
                            </div>


                            <button type="submit" class="btn btn-primary">Thêm</button>
                            <a href="{{ route('colors.index') }}" class="btn btn-success">Quay lại</a>
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
