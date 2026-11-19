<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MobileModel extends Model
{
    protected $fillable = [
        'brand_id',
        'model_name'
    ];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}
