<?php

namespace App\Models;


abstract class UserBase
{
    protected $fillable = array('name', 'email', 'password');
    protected $hidden = ['password', 'remember_token'];
    protected $primaryKey = "id";
    abstract public function role();
}
