<?php

namespace Database\Seeders;

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
		//ProductEloquent::factory()->count(3)->create();
		DB::table('product')->insert(
			[
				'name' => 'Product 1',
				'description' => 'Product 1 description',
				'image' => 'pathImg',
				'price' => 100,
			],
		);
	}
}
