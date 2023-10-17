<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;
    protected $table = 'staffs';
    protected $primaryKey = 'staff_id';
    const UPDATED_AT = null;
    public $timestamps = false;

    protected $fillable = [
        'staff_id',
        'firstname',
        'lastname',
        'tel',
        'email',
        'password',
        'role'
    ];
}
