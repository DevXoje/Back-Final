<?php

namespace Database\Seeders;

use App\Models\{Product};
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{

	public function run()
	{
		Product::create([
			'name' => "product 1",
			'description' => "description 1",
			'price' => 1,
			'stock' => 1,
			//'images' => 'image ' . 1,
		]);
		Product::create([
			'name' => "product 2",
			'description' => "description 2",
			'price' => 2,
			'stock' => 2,
			//'images' => 'image ' . 2,
		]);

	}

	public function deleteStripeProducts()// TODO: Falla, logica parece bien, faltan variables
	{
		/*$products = Cashier::stripe()->products->all()->data;
		$prices = Cashier::stripe()->prices->all()->data;
		$productIdWithPrice = array_map(function ($price) {
			if ($price->product) {
				return $price->product;
			}
		}, $prices);
		$products->each(function ($product) use ($productIdWithPrice) {
			if (!array_search($product->id, $productIdWithPrice)) {
				Cashier::stripe()->products()->delete($product->id);
			}
		});*/
	}
}
