<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Http\Resources\OrderResource;
use App\Models\Customer;
use App\Models\Order;

class OrderController extends ApiController
{

	public function index(Customer $customer)
	{
		if (!$orders = OrderResource::collection(Order::where('customer_id', $customer->id)->get())) {
			return $this->errorResponse(['error' => 'Orders not found'], 404);
		}
		return $this->successResponse('Orders successfully retrieved.', $orders);
	}

	public function store(StoreOrderRequest $request)
	{
		if (!$order = Order::create($request->all())) {
			return $this->errorResponse(['error' => 'Error creating order'], 500);
		}
		return $this->successResponse('Order successfully created.', new OrderResource($order));
	}


	public function show(int $id)
	{
		if (!$order = new OrderResource(Order::find($id))) {
			return $this->errorResponse(['error' => 'Order Not Found'], 404);
		}
		return $this->successResponse('Order successfully retrieved.', $order);
	}

	public function update(UpdateOrderRequest $request, int $id)
	{
		if (!$order = Order::find($id)) {
			return $this->errorResponse(['error' => 'Order Not Found'], 404);
		}
		if (!$order->update($request->all())) {
			return $this->errorResponse(['error' => 'Error updating order'], 500);
		}
		return $this->successResponse('Order successfully updated.', new OrderResource($order));
	}

	public function destroy(Order $order)
	{
		if (!$order->delete()) {
			return $this->errorResponse(['error' => 'Error deleting order'], 500);
		}
		return $this->successResponse('Order successfully deleted.', new OrderResource($order));
	}

	public function items(int $id)
	{
		if (!$order = Order::find($id)) {
			return $this->errorResponse(['error' => 'Order Not Found'], 404);
		}
		return $this->successResponse('Order items successfully retrieved.', $order->items);

	}

	public function getAll()
	{
		if (!$orders = OrderResource::collection(Order::all())) {
			return $this->errorResponse(['error' => 'Orders not found'], 404);
		}
		return $this->successResponse('Orders successfully retrieved.', $orders);
	}


}
