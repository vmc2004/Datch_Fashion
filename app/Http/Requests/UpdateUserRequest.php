<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $userID = $this->segment(4);
        return [
                'fullname' => 'required|max:50|string',
                'email' => "required|email|unique:users,email,$userID",
                'address' => 'required|string',
                'phone' => "required|numeric|unique:users,phone,$userID",
        ];
    }

    public function messages(): array
    {
        return [
                'fullname.required' => 'Vui lòng nhập họ và tên',
                'fullname.max' => 'Độ dài tên tối đa 50 ký tự',
                'fullname.string' => 'Tên không đúng định dạng',
                'email.required' => 'Vui lòng nhập email',
                'email.email' => 'Email không đúng định dạng',
                'email.unique' => 'Email này đã tồn tại',
                'address.required' => 'Vui lòng nhập địa chỉ',
                'address.string' => 'Địa chỉ không tồn tại',
                'phone.required' => 'Vui lòng nhập số điện thoại',
                'phone.numeric' => 'Số điện thoại không đúng định dạng',
                'phone.unique' => 'Số điện thoại đã tồn tại',
                'password.required' => 'Vui lòng nhập mật khẩu',
                'password.min' => 'Độ dài mật khẩu tối thiểu 10 ký tự',
                'password.unique' => 'Mật khẩu đã tồn tại',
        ];
    }
}
