<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Registration extends Model
{
    use HasFactory;
    protected $table = 'registrations';
    protected $primaryKey = 'client_id';
    public $incrementing = false;
    const UPDATED_AT = null;

    protected $fillable = [
        'reg_status',
        'room_id',
        'client_id',
        'startdate',
        'enddate',
        'reg_token'
    ];

    public function client(): BelongsTo {
        return $this->belongsTo(Client::class, 'client_id');
    }

    public function scopeSearch($query, $value) {
        $query->where('room_id', 'like', "%{$value}%");
    }
}
