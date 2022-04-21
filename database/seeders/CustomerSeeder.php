<?php

namespace Database\Seeders;

use App\Models\{Customer, Order, User};
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User([
            'name' => 'xoje',
            'password' => bcrypt('password'),
            'email' => 'xo@je.com'
        ]);
        $user->save();
        $customer = new Customer([
            'id' => $user->id,
            'address' => '123 Main St'
        ]);
        $customer->save();
        $order1 = new Order(['customer_id' => $user->id]);
        $order2 = new Order(['customer_id' => $user->id]);
        $order1->save();
        $order2->save();
        Customer::factory()->count(10)->create();
    }
}
