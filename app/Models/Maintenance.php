<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{
     protected $fillable = [
        'mileage',
        'item',
        'price',
        'quantity',
        'vehicle_id',
    ];
}
