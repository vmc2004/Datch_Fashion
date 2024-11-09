@extends('Admin.layout.app')

@section('title')
    Cập nhật bài viết
@endsection

@section('title-page')
    Bài viết
@endsection

@section('single-page')
    Cập nhật bài viết
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
                    @if (session()->has('success'))
                        <div class="alert alert-success text-white">
                            {{ session()->get('success') }}
                        </div>
                    @endif

                    <div class="container">
                        <h2>Cập Nhật Bài Viết</h2>
                        <a href="{{ route('blogs.index') }}" class="btn btn-secondary mb-2">
                            <i class="fa-solid fa-arrow-left me-2"></i>Quay lại trang danh sách
                        </a>
                        <form method="POST" action="{{ route('blogs.update', $blog) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="title">Tiêu Đề</label>
                                <input type="text" class="form-control" id="title" name="title"
                                    value="{{ $blog->title }}">
                            </div>
                            <div class="form-group">
                                <label for="slug">Slug</label>
                                <input type="text" class="form-control" id="slug" name="slug"
                                    value="{{ $blog->slug }}" onkeyup="ChangeToSlug()">
                            </div>
                            <div class="form-group">
                                <label for="image">Ảnh</label>
                                <input type="file" class="form-control" id="image" name="image">
                                @if ($blog->image)
                                    <img src="{{ asset( $blog->image) }}" alt="Current Image"
                                        width="100">
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="content">Nội Dung</label>
                                <textarea class="form-control" id="content" name="content" rows="">{{ $blog->content }}</textarea>
                            </div>
                            <input type="hidden" id="user_id" name="user_id" value="{{ Auth::user()->id }}">
                            <div class="form-group">
                                <label for="category_id">Danh mục</label>
                                <select class="form-control" id="category_id" name="category_id">
                                    @foreach ($categories as $parent)
                                        <option value="{{ $parent->id }}"
                                            @if ($parent->id == $blog->category_id) selected @endif>{{ $parent->name }}</option>
                                        @if ($parent->children)
                                            @foreach ($parent->children as $child)
                                                <option value="{{ $child->id }}"
                                                    @if ($child->id == $blog->category_id) selected @endif>--
                                                    {{ $child->name }}</option>
                                                @if ($child->children)
                                                    @foreach ($child->children as $grandchild)
                                                        <option value="{{ $grandchild->id }}"
                                                            @if ($grandchild->id == $blog->category_id) selected @endif>----
                                                            {{ $grandchild->name }}</option>
                                                    @endforeach
                                                @endif
                                            @endforeach
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="status">Trạng Thái</label>
                                <select class="form-control" id="status" name="status">
                                    <option value="1" @if ($blog->status == 1) selected @endif>Hoạt Động
                                    </option>
                                    <option value="0" @if ($blog->status == 0) selected @endif>Không Hoạt Động
                                    </option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Cập nhật</button>
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

@section('js')
    <script src="{{ asset('assets/admin/ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace('content');
    </script>

    <script language="javascript">
        function ChangeToSlug() {
            var title, slug;
            title = document.getElementById("title").value;
            slug = title.toLowerCase();
            slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
            slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
            slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
            slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
            slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
            slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
            slug = slug.replace(/đ/gi, 'd');
            slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
            slug = slug.replace(/ /gi, "-");
            slug = slug.replace(/\-\-\-\-\-/gi, '-');
            slug = slug.replace(/\-\-\-\-/gi, '-');
            slug = slug.replace(/\-\-\-/gi, '-');
            slug = slug.replace(/\-\-/gi, '-');
            slug = '@' + slug + '@';
            slug = slug.replace(/\@\-|\-\@|\@/gi, '');
            document.getElementById('slug').value = slug;
        }
    </script>
@endsection
