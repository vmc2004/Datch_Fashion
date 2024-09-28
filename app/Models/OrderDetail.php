<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderDetail extends Model
{
    use HasFactory;
    protected $fillable = 
    [
        'order_id',
        'variant_id',
        'price',
        'quantity',
        'unit_price',
    ];

    public function Variant(): BelongsTo
    {
        return $this->belongsTo(ProductVariant::class);
    }


}
