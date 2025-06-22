<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VehicleRecordDetails extends Model
{
    protected $fillable = [
        'item',
        'price',
        'maintenance_id',
        'record_id',
        'remark',
    ];

    public function record()
    {
        return $this->belongsTo(MyVehicleRecord::class,'record_id','id');
    }

    public function maintenance()
    {
        return $this->hasOne(MyVehicleRecord::class,'id','service_id');
    }
}
