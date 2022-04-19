<?php

namespace App\Http\Controllers;

use App\Models\OrderItem;
use App\Http\Requests\StoreOrderItemRequest;
use App\Http\Requests\UpdateOrderItemRequest;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Foundation\Http\FormRequest;

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
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOrderItemRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrderItemRequest $request)
    {
        $product = Product::findOrFail($request->product_id);
        $order = Order::findOrFail($request->order_id);
        $order->orderItems()->create([
            'product_id' => $product->id,
            'quantity' => $request->quantity,
            'amount' => $product->price * $request->quantity,
        ]);
        $order->amount += $product->price * $request->quantity;
        $order->save();
        return response()->json($order, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OrderItem  $orderItem
     * @return \Illuminate\Http\Response
     */
    public function show(FormRequest $request)
    {
        $code = 404;
        /* $message = "Order items not found";
        $payload = ['message' => $message];
        $order = Order::findOrFail($request->order_id);
        $orderItem = $order->orderItems->find($request->orderItem_id);

        if ($orderItem) {
            $payload = ['data' => $orderItem];
            $code = 200;
        } */
        return response()->json("joder", $code);
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
    public function destroy(int $id)
    {
        $orderItem = OrderItem::findOrFail($id);
        $order = Order::findOrFail($orderItem->order_id);
        $order->amount -= $orderItem->amount;
        $order->save();
        $orderItem->delete();
        return response()->json($order, 200);
    }
}
