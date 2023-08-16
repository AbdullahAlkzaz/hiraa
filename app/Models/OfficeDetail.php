<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfficeDetail extends Model
{
    use HasFactory;
    protected $table = 'office_details';

    protected $guarded = [];

    public function office(){
        return $this->belongsTo(User::class, 'office_id');
    }
}
