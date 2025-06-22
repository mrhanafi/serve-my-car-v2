<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MyList extends Model
{
    protected $fillable = [
        'title',
        'brand',
        'brands_id',
        'model',
        'vehicle_id',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function brand()
    {
        return $this->hasOne(Brand::class,'id','brands_id');
    }

    public function model()
    {
        return $this->hasOne(Vehicle::class,'id','vehicle_id');
    }
}
