<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Registration extends Model
{
    use HasFactory;
    protected $table = 'registrations';
    protected $primaryKey = ['room_id', 'client_id'];
    public $incrementing = false;
    const UPDATED_AT = null;

    public function client(): BelongsTo {
        return $this->belongsTo(Client::class, 'client_id');
    }
}
