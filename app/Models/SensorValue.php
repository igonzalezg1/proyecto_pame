<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SensorValue extends Model
{
    protected $table = 'sensor_values';
    protected $fillable = ['value', 'created_at', 'updated_at'];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    protected $hidden = ['id'];
}
