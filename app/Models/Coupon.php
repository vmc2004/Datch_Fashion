<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'discount',
        'discount_type',
        'usage_limit',
        'usage_limit_per_user',
        'used_count',
        'minimum_amount',
        'maximum_amount',
        'start_date',
        'end_date',
        'is_active',
    ];
}
