<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory;
    use Notifiable;
    protected $guarded = [];


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
        'gender',
        'birthday',
        'language',
        'introduction',
        'google_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // protected function role(): Attribute
    // {
    //     return new Attribute(
    //         get: fn ($value) => isset(["member", "admin"][$value]) ? ["member", "admin"][$value] : "unknown",
    //     );
    // Optional: Modify the role attribute if needed

    // app/Models/User.php
    public function cart()
    {
        return $this->hasMany(Cart::class);
    }
    public function role()
{
    return $this->belongsTo(Role::class);
}
}
