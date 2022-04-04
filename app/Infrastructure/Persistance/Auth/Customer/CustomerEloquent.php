<?php

namespace App\Infrastructure\Persistance\Auth\Customer;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerEloquent extends Model
{
    use HasFactory;
    protected $table = 'customers';
   /*  public function id()
    {
        return $this->hasOne(AuthEloquent::class);
    } */
    static function create(int $auth_id)
    {
        $customer = new self();
        $customer->auth_id = $auth_id;
        $customer->save();
        return $customer;
    }
}
