<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRoleRequest extends FormRequest
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
    public function rules() 
    {
        return [
        'name' => 'required|string|max:255|unique:roles,name',
        'display_name' => 'required|string|max:255',
        'group' => 'required|in:system,user',
       
        ];
    }

    public function message()
    {
        return [
        'name.required' => 'Tên vai trò không được để trống.',
        'name.unique' => 'Tên vai trò đã tồn tại.',
        'display_name.required' => 'Tên hiển thị không được để trống.',
        'group.required' => 'Vui lòng chọn nhóm.',
        
        ];
    }
    
}
