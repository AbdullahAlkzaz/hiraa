<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipment extends Model
{
    use HasFactory;
    protected $table = "shipments";
    protected $guarded = [];

    const COMPLETED = "تم التسليم";
    const STATUSES = [
        "الإستلام",
        "نقطة أ",
        "نقطة ب",
        "خرجة للتسليم",
        "جاري التسليم",
        "مؤجل",
        "ملغي",
        "تم التسليم",
    ];
    
}
