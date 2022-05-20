<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderItemRequest;
use App\Http\Requests\UpdateOrderItemRequest;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Response;

class OrderItemController extends ApiController
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Order $order)
	{
		if ($order->orderItems()->count() > 0) {
			return $this->successResponse($order->orderItems);
		} else {
			return response()->json(['message' => 'No order items found'], 404);
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param OrderItem $orderItem
	 * @return Response
	 */
	public function show(int $order_id, int $orderItem_id)
	{
		$code = 404;
		$message = "Order items not found";
		$payload = ['message' => $message];
		$order = Order::findOrFail($order_id);
		$orderItem = $order->orderItems->find($orderItem_id);

		if ($orderItem) {
			$payload = $orderItem;
			$code = 200;
		}
		return response()->json($payload, $code);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param StoreOrderItemRequest $request
	 * @return Response
	 */
	public function store(int $order_id)
	{

		$quantity = request('quantity');
		$order = Order::findOrFail($order_id);
		$product = Product::findOrFail(request('product_id'));
		$orderItems = $order->orderItems();

		$order->orderItems()->create([
			'product_id' => $product->id,
			'quantity' => $quantity,
			'amount' => $product->price * $quantity,
		]);
		$order->amount += $product->price * $quantity; //Mejorable con un trigger
		$order->save();
		return response()->json($order, 201);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param UpdateOrderItemRequest $request
	 * @param OrderItem $orderItem
	 * @return Response
	 */
	public function update(UpdateOrderItemRequest $request, OrderItem $orderItem)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param OrderItem $orderItem
	 * @return Response
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
