<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBlogRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'string|max:255',
            'content' => 'string',
            'slug' => 'string|unique:blogs,slug',
            'image' => 'nullable',
            'status' => 'boolean',
            'category_id' => 'exists:categories,id',
            'user_id' => 'exists:users,id',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Vui lòng nhập tiêu đề cho bài viết.',
            'content.required' => 'Nội dung bài viết là bắt buộc.',
            'slug.required' => 'Vui lòng nhập slug cho bài viết.',
            'slug.unique' => 'Slug này đã tồn tại. Vui lòng chọn slug khác.',
            'category_id.required' => 'Danh mục là bắt buộc.',
            'category_id.exists' => 'Danh mục không hợp lệ.',
            'user_id.required' => 'Người dùng là bắt buộc.',
            'user_id.exists' => 'Người dùng không hợp lệ.',
        ];
    }
}
