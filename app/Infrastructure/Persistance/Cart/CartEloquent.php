<?php

namespace App\Infrastructure\Persistance\Cart;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartEloquent extends Model
{
    use HasFactory;
    protected $table = "carts";
}
