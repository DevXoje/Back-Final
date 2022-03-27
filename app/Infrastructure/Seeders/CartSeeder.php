<?php

namespace App\Infrastructure\Seeders;

use App\Infrastructure\Persistance\Auth\Customer\CustomerEloquent;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $customers = CustomerEloquent::all();
        //ProductEloquent::factory()->count(3)->create();

        for ($i = 0; $i < 5; $i++) {
            DB::table('carts')->insert(
                [
                    'customer_id' => $customers[rand(0, count($customers) - 1)]->id,
                ],
            );
        }
    }
}
