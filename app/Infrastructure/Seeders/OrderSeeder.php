<?php

namespace App\Infrastructure\Seeders;

use App\Infrastructure\Persistance\Category\CategoryEloquent;
use App\Infrastructure\Persistance\Product\ProductEloquent;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $carts = CategoryEloquent::all();
        $products = ProductEloquent::all();
        //ProductEloquent::factory()->count(3)->create();

        for ($i = 0; $i < 20; $i++) {
            DB::table('orders')->insert(
                [
                    'product_id' => $products[rand(0, count($products) - 1)]->id,
                    'quantity' => 2,
                    'cart_id' =>  $carts[rand(0, count($carts) - 1)]->id,
                ],
            );
        }
    }
}
