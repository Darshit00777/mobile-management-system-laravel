<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mobile extends Model
{
    protected $fillable = [
        'brand_id',
        'mobile_model_id',
        'storage',
        'price',
        'qty',
        'photo'
    ];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function mobileModel()
    {
        return $this->belongsTo(
            MobileModel::class,
            'mobile_model_id'
        );
    }
}
