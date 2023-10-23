<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    use HasFactory;
    protected $table = 'contract';
    protected $fillable = [
        'room_id',
        'client_id',
        'address',
        'id_card',
        'startdate',
        'enddate'
    ];
}
