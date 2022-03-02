<?php

namespace Database\Seeders;

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
				'name' => Str::random(10),
				'email' => Str::random(10) . '@gmail.com',
				'password' => 'secret',
				'remember_token' => Str::random(10),
				'role' => 'admin',
			],
		);
		DB::table('auth')->insert(
			[
				'name' => Str::random(10),
				'email' => Str::random(10) . '@gmail.com',
				'password' => 'secret',
				'remember_token' => Str::random(10),
				'role' => 'customer',
			],
		);
	}
}
