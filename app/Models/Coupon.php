<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'discount',
        'discount_type',
        'quantity',
        'used',
        'max_price',
        'start_date',
        'end_date',
        'is_active',
    ];

}
