<?php

namespace Database\Seeders;

use App\Models\{Admin, Customer, Order, User};
use Illuminate\Database\Seeder;
use Stripe\Customer as StripeCustomer;

class CustomerSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$this->mockAdmin();
		$this->mockCustomers();
	}

	function mockAdmin()
	{
		$user = User::factory()->create([
			'email' => 'admin@admin.com',
			'role' => 'admin',
		]);
		Admin::create([
			'id' => $user->id,
			'is_super' => true,
		]);
	}

	function mockCustomers()
	{

		$user = new User([
			'name' => 'xoje',
			'password' => bcrypt('password'),
			'email' => 'xo@je.com'
		]);
		$user->save();
		$customer = new Customer([
			'id' => $user->id,
			'address' => '123 Main St',
			'phone' => '1234567890',
			'official_doc' => '12345678901234567890',
		]);
		$customer_stripe = StripeCustomer::create([
			'email' => $user->email,
			'name' => $user->name,
			//Todo Probar a intruducir mas datos
		]);
		$customer->stripe_id = $customer_stripe->id;
		$customer->save();
		//$customer->orders()->save(new Order(['customer_id' => $user->id]),new Order(['customer_id' => $user->id]),);
		$order1 = new Order(['customer_id' => $user->id]);
		$order2 = new Order(['customer_id' => $user->id]);
		$order1->save();
		$order2->save();
		//Customer::factory()->count(2)->create();
	}
}
