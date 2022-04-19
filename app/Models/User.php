<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
//use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasFactory, Notifiable;
    /**
     * The attributes excluded from mass assignment.
     *
     * @var array
     */
    /*     protected $guarded = array("id");
    protected $fillable = [
        'name',
        'email',
        'password',
    ];
    protected $hidden = [
        'remember_token',
        "password",
        "created_at",
        "update_at"
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
        "created_at" => "datetime",
        "update_at" => "datetime"
    ]; */

    protected $primaryKey = "id";

    /**
     * The attributes *explicitly* included for mass assignment.
     *
     * @var array
     */
    protected $fillable = array('name', 'email', 'password','role');
    protected $hidden = ['password', 'remember_token'];
/*     protected $with = ['role'];

    public function role()
    {
        return $this->morphTo();
    } */
    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    # To make it easy to know what type of user role we are dealing
    public function getHasAdminRoleAttribute()
    {
        return $this->role == Admin::class;
    }
    public function getHasCustomerRoleAttribute()
    {
        return $this->role == Customer::class;
    }
}
