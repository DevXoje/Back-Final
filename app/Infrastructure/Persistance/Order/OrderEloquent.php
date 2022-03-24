<?php

namespace App\Infrastructure\Persistance\Order;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderEloquent extends Model
{
    use HasFactory;
    protected $table = "orders";
}
