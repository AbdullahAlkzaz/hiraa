<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    // إذا كان اسم الجدول هو 'sections'
    protected $table = 'sections';

    // تحديد الحقول القابلة للتعبئة
    protected $fillable = [
        'title',
        'description',
        'image',
        'video_link',
        'order'
    ];

    // استخدام التواريخ تلقائيًا
    public $timestamps = true;
}
