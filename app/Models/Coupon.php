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
        'usage_limit',
        'usage_limit_per_user',
        'used_count',
        'minimum_amount',
        'maximum_amount',
        'start_date',
        'end_date',
        'is_active',
    ];
    public function getEndDateAttribute()
    {
        return Carbon::parse($this->attributes['end_date'])->format('Y-m-d');
    } 
    public function users(){
        return $this->belongsToMany(User::class, 'coupon_user');
    }

    public function firstWithEndDate($code, $user_id)
    {
        return $this->where('code', $code) 
                    ->whereDate('end_date', '>=', Carbon::now()) 
                    ->whereDoesntHave('users', function($query) use ($user_id) {
                        $query->where('users.id', $user_id);
                    })
                    ->first(); 
    }
}
