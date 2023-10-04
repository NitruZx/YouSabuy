<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Room extends Model
{
    use HasFactory;
    public $incrementing = false;
    protected $keyType = 'string';
    protected $table = 'rooms';
    public $timestamps = false;
    protected $primaryKey = 'room_id';

    public function roomType() : BelongsTo {
        return $this->belongsTo(Room_Type::class, 'type');
    }
}
