<?php

namespace App\Infrastructure\Persistance\Product_Categories;

use App\Infrastructure\Persistance\Category\CategoryEloquent;
use App\Infrastructure\Persistance\Product\ProductEloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_CategoriesEloquent extends Model
{
    use HasFactory;
    protected $table = "product__categories";

    public function product_id()
    {
        return $this->hasOne(ProductEloquent::class);
    }
    
}
