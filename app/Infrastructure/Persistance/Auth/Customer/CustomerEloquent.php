<?php

namespace App\Infrastructure\Persistance\Auth\Customer;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerEloquent extends Model
{
    use HasFactory;
    protected $table = 'customers';
    public function id()
    {
        return $this->hasOne(AuthEloquent::class);
    }
}
