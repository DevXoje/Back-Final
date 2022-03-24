<?php

namespace App\Infrastructure\Seeders;

use App\Infrastructure\Persistance\Category\CategoryEloquent;
use App\Infrastructure\Persistance\Product\ProductEloquent;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$categories = CategoryEloquent::all();
		//ProductEloquent::factory()->count(3)->create();

		for ($i = 0; $i < 20; $i++) {
			DB::table('product')->insert(
				[
					'name' => 'Product ' . $i,
					'description' => 'Product ' . $i . ' description',
					'image' => 'pathImg',
					'category' => $categories[rand(0, count($categories)-1)]->name,
					'price' => 100 * $i,
				],
			);
		}
	}
}
