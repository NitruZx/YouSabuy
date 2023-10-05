<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Room_Type extends Model
{
    use HasFactory;
    public $incrementing = false;
    protected $keyType = 'string';
    protected $table = 'room_types';
    public $timestamps = false;
    protected $primaryKey = 'type';

    public function rooms(): HasMany{
        return $this->hasMany(Room::class);
    }   
}
