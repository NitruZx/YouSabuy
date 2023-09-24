<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    use HasFactory;
    protected $primaryKey = ['room_id', 'client_id'];
    public $incrementing = false;
    const UPDATED_AT = null;
}
