<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $fillable = [
        'code',
        'name',
        'slug',
        'image',
        'price',
        'description',
        'material',
        'status',
        'is_active',
        'category_id',
        'brand_id'
    ];

    // quan hệ 1 nhiều 
    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function galleries()
    {
        return $this->hasMany(ProductGallery::class);
    }

    public function ProductVariants()
    {
        return $this->hasMany(ProductVariant::class);
    }

    public function Comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function Order()
    {
        return $this->hasMany(Order::class);
    }
    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }
    public $timestamps = true;
    protected $dates = ['deleted_at'];
}
