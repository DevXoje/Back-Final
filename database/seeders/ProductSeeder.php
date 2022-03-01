<?php

namespace Database\Seeders;

use App\Models\ProductEloquent;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		ProductEloquent::factory()->count(3)->create();
	}
}
