<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $fillale = [
        'user_id',
        'status'
    ];
    public function CartItem() {
        return $this->hasMany(CartItem::class);
    }
}
