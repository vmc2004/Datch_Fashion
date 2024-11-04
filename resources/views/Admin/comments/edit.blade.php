@extends('Admin.layout.app')

@section('title')
    cập nhật bình luận
@endsection

@section('title-page')
    Bình luận
@endsection

@section('single-page')
    cập nhật trạng thái bình luận
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
                    @if (session()->has('message'))
                        <div class="alert alert-success text-white">
                            {{ session()->get('message') }}
                        </div>
                    @endif
                    <div class="container" style="width: 60%">
                        <h2>cập nhật trạng thái bình luận</h2>
                        <form method="POST" action="{{ route('comments.update', $comment) }}" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="form-group">
                                <label for="my-select">Trạng thái</label>
                                <select id="my-select" class="form-control" name="status">
                                    <option value="pending" >Đang chờ</option>
                                    <option value="approved" {{$comment->status=='approved'?'selected':''}}>Duyệt bình luận</option>
                                    <option value="rejected" {{$comment->status=='rejected'?'selected':''}}>Từ chối</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Cập nhật</button>
                            <a href="{{ route('comments.index') }}" class="btn btn-success">Quay lại</a>
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
