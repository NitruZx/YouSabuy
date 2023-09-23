<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room_Type extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'type';
}
