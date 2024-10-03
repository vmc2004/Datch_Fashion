<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Casts\Attribute;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'fullname',
        'avatar',
        'phone',
        'address',
        'email',
        'email_verified_at',
        'password',
        'role',
        'status',
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

           

            
                    get: fn ($value) => $value !== null && in_array($value, [0, 1]) ? ["member", "admin"][$value] : "member",
                );
            
            

        
    }
}
