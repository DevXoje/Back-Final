<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $code = 200;
        $message = "Product not found";
        $payload = ['message' => $message];
        $products = Product::all();

        if ($products) {
            $payload = $products;
        } else {
            $code = 200;
        }
        return response()->json($payload, $code);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        $product = Product::create($request->all());
        return response()->json($product, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $code = 200;
        $message = "Product not found";
        $payload = ['message' => $message];
        $product = Product::find($id);
        if ($product) {
            $payload =  $product;
        } else {
            $code = 400;
        }
        return response()->json($payload, $code);
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {

        $product->update($request->all());
        return $product;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $product = Product::find($id);
        $code = 404;
        $messageNotFound = "Product not found";
        $messageFounded = "Product " . $id . " deleted";
        $payload = ['message' => ''];
        if (!$product) {
            $payload = ['message' => $messageNotFound];
            $code = 404;
        } else {
            $product->delete();
            $payload = ['message' => $messageFounded];
            $code = 204;
        }
        return response()->json($payload, $code);
    }
}
