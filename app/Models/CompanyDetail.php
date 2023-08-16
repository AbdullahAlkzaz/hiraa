<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;

class CompanyDetail extends Model
{
    use HasFactory;
    
    protected $table = 'company_details';

    protected $guarded = [];

    public function company(){
        return $this->belongsTo(User::class, 'company_id');
    }
}
