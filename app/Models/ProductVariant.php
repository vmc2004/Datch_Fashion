<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariant extends Model
{
    use HasFactory;
    protected $fillable =[
    'product_id',
    'color_id',
    'size_id',
    'quantity',
    'image',
    ];

    public function Product()
{
    return $this->belongsTo(Product::class);
}
    public function Color()
    {
        return $this->belongsTo(Color::class);
    }
    public function Size()
    {
        return $this->belongsTo(Size::class);
    }
}
