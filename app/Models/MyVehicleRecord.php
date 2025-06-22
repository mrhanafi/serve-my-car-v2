<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MyVehicleRecord extends Model
{
    protected $fillable = [
        'current_mileage',
        'date_of_service',
        'service_mileage',
        'mylist_id',
        'remark',
    ];

    public function recordDetails()
    {
        return $this->hasMany(VehicleRecordDetails::class,'record_id','id');
    }
}
