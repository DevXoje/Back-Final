<?php

namespace Database\Seeders;

use App\Models\{Customer, Order, OrderItem, Product};
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{


	public function run()
	{

		$products = Product::all();

		Customer::all()->each(function (Customer $customer) use ($products) {
			$order = new Order();
			$order->customer_id = $customer->id;
			$order->save();

			$productsSelected = $products->random(2);
			$quantity = rand(1, 5);
			$productsSelected->each(function (Product $product) use ($order, $quantity) {
				$orderItem = new OrderItem([
					'order_id' => $order->id,
					'product_id' => $product->id,
					'quantity' => $quantity,
					'amount' => $product->price * $quantity,
				]);
				$orderItem->save();

			});

		});

	}
}
