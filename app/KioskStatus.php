<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KioskStatus extends Model
{
    protected $fillable = [
        'referred', 'last_ping_time',
    ];
    protected $dates=['last_ping_time'];
}
