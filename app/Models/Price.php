<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    use HasFactory;

    protected $fillable = [
        'price',
        'coupon',
        'discount_type',  // تأكد من وجود هذا الحقل هنا
        'coupon_time',
        'final_price',
        'features',
        'lecture_duration',
        'sessions_per_week',
        'coupon_end_date',
    ];
    

    public function getFeaturesAttribute($value)
    {
        return json_decode($value, true);
    }
    
}
