<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    protected $table = "admins";
    protected $guard = 'admin';
    protected $primaryKey = "id";
    protected $autoincrement = true;
    /* public function role()
    {
        return $this->hasOne(User::class,'id');
    } */
}
