<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VerificationCode extends Model
{
    use HasFactory;

    protected $fillable = [
        'contact_method_id',
        'code',
        'is_verified',
    ];

    public function contactMethod()
    {
        return $this->belongsTo(ContactMethod::class);
    }
}
