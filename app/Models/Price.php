<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'price',
        'coupon',
        'coupon_time',
        'features'
    ];

    public function getFeaturesAttribute($value)
    {
        return json_decode($value, true);
    }
}
