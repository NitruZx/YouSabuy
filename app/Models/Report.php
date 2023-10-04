<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Report extends Model
{
    use HasFactory;
    protected $table = 'reports';
    protected $primaryKey = 'report_id';
    public const UPDATED_AT = null;

    public function client(): BelongsTo {
        return $this->belongsTo(Client::class, 'tenant_id');
    }
}
