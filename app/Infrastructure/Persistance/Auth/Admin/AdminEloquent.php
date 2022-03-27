<?php

namespace App\Infrastructure\Persistance\Auth\Admin;

use App\Infrastructure\Persistance\Auth\AuthEloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminEloquent extends Model
{
    use HasFactory;
    protected $table = 'admins';
    
    public function id()
    {
        return $this->hasOne(AuthEloquent::class);
    }
}
