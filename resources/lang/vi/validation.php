<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines (Dòng thông báo xác thực)
    |--------------------------------------------------------------------------
    |
    | Các dòng ngôn ngữ sau chứa thông báo lỗi mặc định cho các quy tắc
    | xác thực của Laravel. Bạn có thể dễ dàng sửa lại thành ngôn ngữ
    | của mình.
    |
    */

    'required' => ':attribute không được để trống.',
    'email' => ':attribute phải là một địa chỉ email hợp lệ.',
    'min' => [
        'string' => ':attribute phải có ít nhất :min ký tự.',
        'array' => ':attribute phải có ít nhất :min phần tử.',
    ],
    'max' => [
        'string' => ':attribute không được vượt quá :max ký tự.',
        'array' => ':attribute không được vượt quá :max phần tử.',
    ],
    'numeric' => ':attribute phải là một số.',
    'array' => ':attribute phải là một mảng.',
    'unique' => ':attribute đã tồn tại.',
    'confirmed' => 'Giá trị xác nhận :attribute không khớp.',
    'integer' => ':attribute phải là số nguyên.',
    'between' => [
        'numeric' => ':attribute phải nằm trong khoảng từ :min đến :max.',
        'string' => ':attribute phải có độ dài từ :min đến :max ký tự.',
    ],
    'exists' => ':attribute không tồn tại trong hệ thống.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | Dùng để thay thế tên các trường trong form thành tên dễ hiểu
    | khi hiển thị lỗi.
    |
    */

    'attributes' => [
        'name' => 'Tên vai trò',
        'display_name' => 'Tên hiển thị',
        'email' => 'Email',
        'password' => 'Mật khẩu',
    ],
];
