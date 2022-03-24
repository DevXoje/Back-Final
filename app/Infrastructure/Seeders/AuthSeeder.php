<?php

namespace App\Infrastructure\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{

		DB::table('auth')->insert(
			[
				'name' => 'admin',
				'email' => 'admin@gmail.com',
				'password' => bcrypt('admin'),
				'remember_token' => Str::random(10),
				'role' => 'admin',
			],
		);
		DB::table('auth')->insert(
			[
				'name' => 'customer',
				'email' => 'customer@gmail.com',
				'password' => bcrypt('customer'),
				'remember_token' => Str::random(10),
				'role' => 'customer',
			],
		);
	}
}
