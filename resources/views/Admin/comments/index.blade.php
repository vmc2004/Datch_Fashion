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
      <div class="card-header py-3">
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
                <th>tên sản phẩm</th>
                <th>Người bình luận</th>
                <th>Nội dung</th>
                <th>Đánh giá</th>
                <th>Đánh giá</th>
                <th>Trạng thái</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($comments as $comment )
              <tr>
                <td>{{$comment->product->name}}</td>
                <td>{{$comment->user->fullname}}</td>
                <td>{{$comment->content}}</td>
                <td>{{$comment->rating}} sao</td>
                <td>{{$comment->status}}</td>
                <td>
                  <a href="{{route('comments.edit',$comment->id)}}" class="btn btn-warning">Cập nhật trạng thái</a>
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

