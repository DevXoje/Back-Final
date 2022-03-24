<?php

namespace App\Http\Controllers;

use App\Infrastructure\Persistance\Category\CategoryEloquent;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return CategoryEloquent::all();
    }
}
