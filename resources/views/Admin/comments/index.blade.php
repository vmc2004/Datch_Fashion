@extends('Admin.layout.app')

@section('title')
    Danh sách bình luận
@endsection

@section('title-page')
    Bình luận
@endsection

@section('single-page')
    Danh sách bình luận
@endsection

@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
      <div class="card mt-3">
        <h3 class="card-header text-center">Danh sách bình luận</h3>
    </div>
                      <!-- Form tìm kiếm -->
                      <div class="container-fluid mb-3 mt-4   ">
                        <form action="{{ route('categories.search') }}" method="GET" class="row g-3">
                            <div class="col-md-9">
                                <input type="text" name="name" class="form-control" placeholder="Tìm kiếm theo tên sản phẩm"
                                    value="{{ request('name') }}">
                            </div>
                            <div class="col-md-3">
                                <button type="submit" class="btn btn-primary w-50">
                                    <i class="fa-solid fa-magnifying-glass me-2"></i>Tìm kiếm
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Form lọc danh mục -->
                    <div class="container-fluid d-flex align-items-center justify-content-between">
                        <div class="flex-grow-1 me-3">
                            <form action="{{ route('categories.filter') }}" method="GET" class="row g-3">
                                <div class="col-md-5">
                                    <select class="form-select" name="is_active">
                                        <option value="">Tất cả trạng thái</option>
                                        <option value="1" {{ request('is_active') == '1' ? 'selected' : '' }}>Hiển thị</option>
                                        <option value="0" {{ request('is_active') == '0' ? 'selected' : '' }}>Đã ẩn</option>
                                    </select>
                                </div>
                                <div class="col-md-5">
                                    <select class="form-select" name="sort">
                                        <option value="">Sắp xếp theo</option>
                                        <option value="az" {{ request('sort') == 'az' ? 'selected' : '' }}>A-Z</option>
                                        <option value="za" {{ request('sort') == 'za' ? 'selected' : '' }}>Z-A</option>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <button type="submit" class="btn btn-primary w-100">Lọc</button>
                                </div>
                            </form>
                        </div>
                        <!-- Nút thêm mới -->
                    </div>
      <div class="card-body">
        <div class="table-responsive">
          {{-- search --}}
        {{-- end search --}}
          <table
            class="table table-bordered"
            id="dataTable"
            width="100%"
            cellspacing="0"
          >

          @if (session()->has('message'))
                    <div class="alert alert-success text-white slide-in" id="success-message">
                        {{ session()->get('message') }}
                    </div>
                    <script>
                        const message = document.getElementById('success-message');
                
                        // Hiển thị thông báo với hiệu ứng cuộn từ từ từ trái qua phải
                        setTimeout(function() {
                            message.classList.add('show');
                        }, 100); // Thêm một chút trễ để hiệu ứng diễn ra mượt mà
                
                        // Ẩn thông báo sau 2 giây với hiệu ứng cuộn từ phải qua trái
                        setTimeout(function() {
                            message.classList.remove('show');
                            message.classList.add('hide', 'slide-out');
                
                            // Sau khi hiệu ứng kết thúc, hoàn toàn ẩn thông báo
                            setTimeout(function() {
                                message.style.display = 'none';
                            }, 500); // Độ trễ của hiệu ứng cuộn 0.5 giây
                        }, 2000); // Thời gian hiển thị thông báo 2 giây
                    </script>
                @endif
            <thead>
              <tr>
                <th>Ảnh sản phẩm</th>
                <th>Tên sản phẩm</th>
                <th>Người bình luận</th>
                <th>Nội dung</th>
                <th>Đánh giá</th>
                <th>Thời gian</th>
                <th>Trạng thái</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($comments as $comment )
              <tr>
                <td><img src="{{asset($comment->product->image)}}" alt="Ảnh sản phẩm" width="70"></td>
                <td>{{$comment->product->name}}</td>
                <td>{{$comment->user->fullname}}</td>
                <td>{{$comment->content}}</td>
                <td>{{$comment->rating}} sao</td>
                <td>{{$comment->created_at}} </td>
                <td>
                  <form method="POST" action="{{ route('comments.update', $comment) }}" enctype="multipart/form-data" class="d-inline">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <select id="my-select" class="form-control" name="status">
                            <option value="approved" {{$comment->status=='approved'?'selected':''}}>Duyệt bình luận</option>
                            <option value="rejected" {{$comment->status=='rejected'?'selected':''}}>Từ chối</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">cập nhật</button>
                  </form>
            </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          {{$comments->links()}}
        </div>
      </div>
    </div>
  </div>
@endsection

