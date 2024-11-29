<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commune extends Model
{
    use hasFactory;

    protected $table = 'address_commune';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'name',
        'type',
        'district_id',
    ];

    public function district()
    {
        return $this->belongsTo(District::class, 'district_id', 'id');
    }
}
