<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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
    public static function getCartItems($cart_id){
        return DB::table('cart_items')->where('cart_id', $cart_id)->get();
    }
}
