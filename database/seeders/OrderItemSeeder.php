<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Database\Seeder;

class OrderItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $orders = Order::all();
        $products = Product::all();
        foreach ($orders as $order) {
            $products = $products->random(2);
            $quantity = rand(1, 5);
            foreach ($products as $product) {
                $orderItem = new OrderItem();
                $orderItem->order_id = $order->id;
                $orderItem->product_id = $product->id;
                $orderItem->quantity = $quantity;
                $orderItem->amount = $product->price * $quantity;
                $orderItem->save();
                $order->amount += $orderItem->amount;
            }
            $order->save();
        }
    }
}
