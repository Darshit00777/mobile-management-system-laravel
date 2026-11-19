<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Purches extends Model
{
    protected $fillable = [
        'user_id',
        'mobile_id',
        'qty',
        'status'
    ];

    public function mobile()
    {
        return $this->belongsTo(Mobile::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
