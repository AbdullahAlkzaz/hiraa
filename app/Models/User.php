<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Traits\HasPermissionsTrait;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasPermissionsTrait;

    const ADMIN_EMAIL = "admin@admin.com";
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /***********************Start Model Mutators****************** */
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = Hash::make($password);
    }
    /***********************#End Model Mutators****************** */

    /****************Start Scopes functions************ */

    public function scopeEmail($query, $email)
    {
        return $this->where("email", $email);
    }
    /****************End Scopes functions************ */

    public function company_details(){
        return $this->hasOne(CompanyDetail::class, "company_id");
    }
    public function office_details(){
        return $this->hasOne(OfficeDetail::class, "office_id");
    }
    public function wallet(){
        return $this->hasOne(Wallet::class, "user_id");
    }

}
