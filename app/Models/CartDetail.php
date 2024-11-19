<?php

// app/Models/CartDetail.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class CartDetail extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['cart_id', 'product_variant_id', 'quantity', 'price'];

    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

    public function productVariant()
    {
        return $this->belongsTo(ProductVariant::class);
    }
    public function product()
    {
        return $this->hasOneThrough(Product::class, ProductVariant::class, 'id', 'id', 'product_variant_id', 'product_id');
    }
    public static function getCartItems($cart_id){
        return DB::table('cartItems')->where('cart_id', $cart_id)->get();
    }
}
