<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MaidCall extends Model
{
    use HasFactory;
    protected $table = 'maid_calls';
    protected $primaryKey = 'calling_id';
    public const UPDATED_AT = null;

    public function client(): BelongsTo {
        return $this->belongsTo(Client::class, 'tenant_id');
    }
}
