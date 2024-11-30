<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;
    protected $table = 'address_district';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'name',
        'type',
        'province_id',
    ];

    public function communes()
    {
        return $this->hasMany(Commune::class, 'district_id', 'id');
    }

    public function province()
    {
        return $this->belongsTo(Province::class, 'province_id', 'id');
    }
}
