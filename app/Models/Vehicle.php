<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Vehicle extends Model
{
    protected $fillable = [
        'model',
        'brand_id',
        'vehicle_type',
    ];

    public function brand():BelongsTo
    {
        return $this->belongsTo(Brand::class,'brand_id','id');
    }

    public function vehicleModel():HasMany
    {
        return $this->hasMany(Maintenance::class,'vehicle_id');
    }
}
