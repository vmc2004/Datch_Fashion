<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Color extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'colors';

    protected $fillable = ['name', 'color_code'];

    public $timestamps = false;

    protected $dates = ['deleted_at'];

    public function productVariant()
    {
        return $this->hasMany(ProductVariant::class);
    }
}
