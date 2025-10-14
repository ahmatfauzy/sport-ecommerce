<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'order_id',
        'name',
        'email',
        'amount',
        'status',
        'snap_token',
    ];
}
