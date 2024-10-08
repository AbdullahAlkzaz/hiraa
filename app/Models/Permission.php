<?php

namespace App\Models;
use App\Models\User;
use App\Models\Role;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;
    protected $table = "permissions";
    
    protected $fillable = [
        "slug",
        "name",
    ];

    public function roles(){
        return $this->belongsToMany(Role::class,"roles_permissions");
    }
    public function users(){
        return $this->belongsToMany(User::class,"users_permissions");
    }
}
