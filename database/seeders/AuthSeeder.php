<?php

namespace Database\Seeders;

use App\Models\AuthEloquent;
use Illuminate\Database\Seeder;

class AuthSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		AuthEloquent::factory()->count(3)->create();
	}
}
