<?php

namespace App\Models;

use Error;
use Illuminate\Database\Eloquent\{Model, SoftDeletes};
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Cashier\Cashier;
use Stripe\{Exception\ApiErrorException};

class Product extends Model
{
	use HasFactory, SoftDeletes;

	protected $primaryKey = "id";
	protected $table = "products";
	protected $softDelete = true;
	protected $fillable = ['name', 'description', 'images', 'price', 'stock', 'stripe_id'];
	protected $fields = ['name', 'description', 'images', 'price', 'stock', 'stripe_id'];

	protected $casts = [
		'name' => 'string',
		'description' => 'string',
		'images' => 'string',//podria ser un array
		'price' => 'float',
		'stock' => 'integer',
		'stripe_id' => 'string',
	];


	public static function create($product_data)
	{
		$product = new Product($product_data);

		$product->save();
		try {
			$stripe_product = Cashier::stripe()->products->create([
				'name' => $product_data['name'],
				'description' => $product_data['description'],
				'active' => $product_data['stock'] > 0,
				'url' => env('URL_FRONTEND') . "/products/" . $product->id,
			]);
			$product->stripe_id = $stripe_product->id;
			$product->save();
			return $product;


		} catch (ApiErrorException $e) {
			new Error($e->getMessage());
		}


	}

	public static function destroy($id)
	{
		$product = Product::find($id);

		try {
			Cashier::stripe()->products->delete($product->stripe_id);
			$product->delete();
		} catch (ApiErrorException $e) {
			new Error($e->getMessage());
		}
		$product->delete();
	}


}
