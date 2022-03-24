<?php

namespace App\Infrastructure\Persistance\Category;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryEloquent extends Model
{
    use HasFactory;
    protected $table = "category";
}
