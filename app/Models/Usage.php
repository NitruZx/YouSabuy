<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usage extends Model
{
    use HasFactory;
    const UPDATED_AT = null;
    protected $primaryKey = 'usage_id';

    protected $fillable = [
        'room_id',
        'water_units',
        'electric_units',
        'monthly_water_units',
        'monthly_electric_units'
    ];
}
