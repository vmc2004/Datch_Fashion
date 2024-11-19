<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'fullname', 
        'phone',    
        'address',  
        'email',    
        'payment',  
        'total_money',  
        'status',   
        'user_id',  
    ];
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function orderDetails(): HasMany
    {
        return $this->hasMany(OrderDetail::class, 'order_id');
    }
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
