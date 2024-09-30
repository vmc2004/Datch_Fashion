<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Foundation\Auth\User as Authenticatable; // Kế thừa lớp này để hỗ trợ xác thực
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'fullname',
        'phone',
        'address',
        'email',
        'password',
        'role'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // Optional: Modify the role attribute if needed
    protected function role(): Attribute
    {
        return new Attribute(
            get: fn($value) => ["user", "admin"][$value],
        );
    }
}
