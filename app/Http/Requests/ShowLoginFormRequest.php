<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShowLoginFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // Cho phép tất cả người dùng thực hiện yêu cầu này.
        // Nếu cần kiểm tra quyền, thêm logic tại đây.
        // Kiểm tra nếu người dùng đã đăng nhập và có vai trò 'member'
    if (auth()->check() && auth()->user()->role == 'member') {
        // Nếu không phải là 'member', từ chối quyền truy cập
        return false;
    }
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => ['required', 'email', 'exists:users,email'],
            'password' => ['required', 'string', 'min:8'],
        ];
    }

    /**
     * Custom messages for validation errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'email.required' => 'Email không được để trống.',
            'email.email' => 'Định dạng email không hợp lệ.',
            'email.exists' => 'Email này không tồn tại trong hệ thống.',
            'password.required' => 'Mật khẩu không được để trống.',
            'password.min' => 'Mật khẩu phải có ít nhất :min ký tự.',
        ];
    }
}
