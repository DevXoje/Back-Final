<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use Exception;
use Laravel\Cashier\Cashier;
use Stripe\Exception\ApiErrorException;

class ProductController extends ApiController
{

	public function index()
	{
		if (!$products = Product::all()) {
			return $this->errorResponse('No product found', 404);
		}
		return $this->successResponse('Products successfully fetched', $products);
	}


	public function store(StoreProductRequest $request)
	{
		if (!$product = Product::create($request->all())) {
			return $this->errorResponse('No product found', 404);
		}
		return $this->successResponse('Product successfully created', $product);
	}


	public function show(int $id)
	{
		if (!$product = Product::find($id)) {
			return $this->errorResponse('No product found', 404);
		}
		return $this->successResponse('Product successfully fetched', $product);

	}


	public function update(UpdateProductRequest $request, Product $product)
	{

		$payload = [
			'old' => $product->toArray(),
		];
		if ($product->update($request->all())) {
			$payload['new'] = $product;
			return $this->successResponse('Product successfully updated', $payload);
		} else {
			return $this->errorResponse('Product not updated', 404);
		}
	}


	public function destroy(int $id)
	{
		if ($product = Product::destroy($id)) {
			return $this->successResponse('Product ' . $id . ' successfully deleted', ["product_deleted" => $product]);
		} else {
			return $this->errorResponse('Product not deleted', 404);
		}

	}

	public function destroyAll()
	{
		try {
			$products = Cashier::stripe()->products->all(['limit' => 100])->data;
			foreach ($products as $product) {
				Cashier::stripe()->products->delete($product->id);
			}
		} catch (ApiErrorException $e) {
			return $this->errorResponse($e->getMessage(), $e->getCode());
		} catch (Exception $e) {
			return $this->errorResponse("Generico=> " . $e->getMessage(), $e->getCode());
		}


	}
}
