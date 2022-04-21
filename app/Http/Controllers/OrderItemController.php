<?php

namespace App\Http\Controllers;

use App\Models\OrderItem;
use App\Http\Requests\StoreOrderItemRequest;
use App\Http\Requests\UpdateOrderItemRequest;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(int $id)
    {
        $code = 404;
        $message = "Order items not found";
        $payload = ['message' => $message];
        $order = Order::findOrFail($id);
        $orderItems = $order->orderItems;

        if ($orderItems) {
            $payload = ['data' => $orderItems];
            $code = 200;
        }
        return response()->json($payload, $code);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OrderItem  $orderItem
     * @return \Illuminate\Http\Response
     */
    public function show(int $order_id, int $orderItem_id)
    {
        $code = 404;
        $message = "Order items not found";
        $payload = ['message' => $message];
        $order = Order::findOrFail($order_id);
        $orderItem = $order->orderItems->find($orderItem_id);

        if ($orderItem) {
            $payload = ['data' => $orderItem];
            $code = 200;
        }
        return response()->json($payload, $code);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOrderItemRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(int $order_id)
    {
        $quantity = request('quantity');
        $order = Order::findOrFail($order_id);
        $product = Product::findOrFail(request('product_id'));
        $order->orderItems()->create([
            'product_id' => $product->id,
            'quantity' => $quantity,
            'amount' => $product->price * $quantity,
        ]);
        $order->amount += $product->price * $quantity;
        $order->save();
        return response()->json($order->orderItems, 201);
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOrderItemRequest  $request
     * @param  \App\Models\OrderItem  $orderItem
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrderItemRequest $request, OrderItem $orderItem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OrderItem  $orderItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $order_id, int $orderItem_id)
    {
        $code = 404;
        $messageNotFound = "Order items not found";
        $messageFounded = "Order item deleted";
        $payload = ['message' => $messageNotFound];
        $order = Order::findOrFail($order_id);
        $orderItem = $order->orderItems->find($orderItem_id);

        if ($orderItem) {
            $order->amount -= $orderItem->amount;
            $order->save();
            $orderItem->delete();
            $payload = ['message' => $messageFounded];
        }
        return response()->json($payload, $code);
    }
}
