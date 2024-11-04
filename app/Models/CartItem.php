<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    use HasFactory;

    protected $fillable = ['cart_id', 'variant_id', 'quantity', 'price_at_purchase'];

    
    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

    
    public function variant()
    {
        return $this->belongsTo(ProductVariant::class);
    }
}
