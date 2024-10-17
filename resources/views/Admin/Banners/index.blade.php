@extends('Admin.layout.app')

@section('title')
    Danh sách banner
@endsection

@section('title-page')
    Banner
@endsection

@section('single-page')
    Danh sách banner
@endsection

@section('content')
<div class="container-fluid">
    <a href="{{ route('banners.create') }}" class="btn btn-success">Thêm banner</a>
    @if (session()->has('message'))
      <div class="alert alert-success text-white">
        {{session()->get('message')}}
      </div>
    @endif
    <div class="card shadow mb-4">
      <div class="card-header py-3">
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table
            class="table table-bordered"
            id="dataTable"
            width="100%"
            cellspacing="0"
          >
            <thead>
              <tr>
                <th>ID</th>
                <th>Tiêu đề</th>
                <th>Ảnh banner</th>
                <th>Nội dung</th>
                <th>Ngày tạo</th>
                <th>Hành động</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($banners as $banner )
              <tr>
                <td>{{$banner->id}}</td>
                <td>{{$banner->title}}</td>
                <td>
                    <img src="{{ asset('/storage/' . $banner->image) }}" alt="" width="100">
                </td>
                <td>{{$banner->description}}</td>
                <td>{{$banner->created_at}}</td>
                <td>
                  <a href="{{route('banners.edit',$banner)}}" class="btn btn-warning">Cập nhật</a>
                  <form class="d-inline" action="{{ route('banners.destroy', $banner->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" onclick="return confirm('Bạn có chắc là muốn xóa hay không?')" type="submit">Xóa</button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          {{$banners->links()}}
        </div>
      </div>
    </div>
  </div>
@endsection

