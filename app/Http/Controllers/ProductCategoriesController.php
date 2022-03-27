<?php

namespace App\Http\Controllers;

use App\Models\Product_Categories;
use App\Http\Requests\StoreProduct_CategoriesRequest;
use App\Http\Requests\UpdateProduct_CategoriesRequest;
use App\Infrastructure\Persistance\Product\ProductEloquent;

class ProductCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collect=ProductEloquent::find(4)->categories;
        return  $collect;
        return "index";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProduct_CategoriesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProduct_CategoriesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product_Categories  $product_Categories
     * @return \Illuminate\Http\Response
     */
    public function show(Product_Categories $product_Categories)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product_Categories  $product_Categories
     * @return \Illuminate\Http\Response
     */
    public function edit(Product_Categories $product_Categories)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProduct_CategoriesRequest  $request
     * @param  \App\Models\Product_Categories  $product_Categories
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProduct_CategoriesRequest $request, Product_Categories $product_Categories)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product_Categories  $product_Categories
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product_Categories $product_Categories)
    {
        //
    }
}
