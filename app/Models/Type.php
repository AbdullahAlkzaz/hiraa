<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;
    protected $table = "types";
    protected $guarded = [];

    const COMPANY_TYPE = 1;    
    const OFFICE_TYPE = 2;    
    const SELLER_TYPE = 3;    
    const REPRESENTATIVE_TYPE = 4;    
    
}
