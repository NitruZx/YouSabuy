<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    const UPDATED_AT = null;
    public $incrementing = false;
    protected $table = 'reservations';
    protected $primaryKey = ['room_id', 'user_id'];
}
