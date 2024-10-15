<tr>
    <td>
        @if ($category->image)
            <img src="{{ asset($category->image) }}" alt="Ảnh danh mục" width="100">
        @else
            <span>Không có ảnh</span>
        @endif
    </td>
    <td>
        {!! str_repeat('-', $level * 1) !!} <!-- Hiển thị khoảng cách để phân biệt các cấp -->
        {{ $category->name }}
    </td>
    <td>
        {{ $category->parent ? $category->parent->name : 'Không có' }}
    </td>
    <td>
        <form action="{{ route('categories.hide', $category->id) }}" method="POST" style="display:inline;">
            @method('PATCH')
            @csrf
            <button type="submit" class="btn btn-sm {{ $category->is_active ? 'btn-secondary' : 'btn-warning' }}">
                {{ $category->is_active ? 'Đã hiển thị' : 'Đã ẩn' }}
            </button>
        </form>
    </td>
    <td >
        <div class="d-flex">
            <a href="{{ route('categories.edit', $category) }}" class="btn btn-sm btn-info me-2">
                <i class="fa-solid fa-pen-to-square"></i>
            </a>
            <form action="{{ route('categories.destroy', $category) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger"
                    onclick="return confirm('Bạn có chắc là muốn xóa hay không?')">
                    <i class="fa-solid fa-trash"></i>
                </button>
            </form>
        </div>
        
    </td>
</tr>

<!-- Đệ quy để hiển thị danh mục con, nếu có -->
@if ($category->children->count() > 0)
    @foreach ($category->children as $child)
        @include('Admin.Categories.category_row', ['category' => $child, 'level' => $level + 1])
    @endforeach
@endif
