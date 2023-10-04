<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Repair_Request extends Model
{
    use HasFactory;
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    protected $table = 'repair_requests';
    protected $primaryKey = 'request_id';
    public const UPDATED_AT = null;

    public function client(): BelongsTo {
        return $this->belongsTo(Client::class, 'tenant_id');
    }
}
