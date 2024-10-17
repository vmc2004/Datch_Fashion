<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductGallery extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'product_galleries';

    protected $fillable = ['image', 'product_id'];

    public $timestamps = false;

    protected $dates = ['deleted_at'];
    
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
