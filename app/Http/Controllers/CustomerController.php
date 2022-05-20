<?php

namespace App\Http\Controllers;

use Exception;
use App\Http\Requests\{StoreCustomerRequest, UpdateCustomerRequest};
use App\Http\Resources\{CustomerResource, OrderResource};
use App\Models\Customer;
use App\Models\User;

class CustomerController extends ApiController
{

	public function index()
	{
		if (!$customers = CustomerResource::collection(Customer::all())) {
			return $this->errorResponse('No customers found', 404);
		}
		return $this->successResponse('Customers successfully fetched', $customers);
	}


	public function store(StoreCustomerRequest $request)
	{
		if (!$request) {
			return $this->errorResponse('Not valid customer data', 404);
		}
		$customer = Customer::create($request->all());
		return $this->successResponse('Customers successfully created', $customer);

	}

	public function show(int $id)
	{
		if (!$customer = new CustomerResource(Customer::find($id))) {
			return $this->errorResponse(['error' => 'Customer Not Found'], 404);
		}
		return $this->successResponse('Customer successfully retrieved.', $customer);
	}

	public function update(UpdateCustomerRequest $request, Customer $customer)
	{

		if (!$customer) {
			return $this->errorResponse(['error' => 'Customer Not Found'], 404);
		}

		if ($request->has('name') || $request->has('email') || $request->has('password')) {
			$user = User::updated();
			return $user;
			$user->update($request->only(['name', 'email', 'password']));
		}

		$customer->update($request->except(['name', 'email', 'password']));
		return $this->successResponse('Customer successfully updated.', $customer);

	}

	public function destroy(int $id)
	{
		if (!$customer = Customer::find($id)) {
			return $this->errorResponse(['error' => 'Customer Not Found'], 404);
		}
		$customer->delete();
		return $this->successResponse('Customer successfully deleted.', $customer);
	}

	/*
	 * public function orders(int $customer_id)
	{
		if (!$orders = OrderResource::collection(Customer::find($customer_id)->orders)) {
			return $this->errorResponse('No orders found', 404);
		}
		return $this->successResponse('Orders successfully fetched', $orders);
	}

	public function order(int $customer_id, int $order_id)
	{

		if (!$order = new OrderResource(Customer::find($customer_id)->orders()->find($order_id))) {
			return $this->errorResponse('No order found', 404);
		}
		return $this->successResponse('Order successfully fetched', $order);
	}
	 * */

	public function lastOrder(int $customer_id)
	{
		if (!$lastOrder = new OrderResource(Customer::find($customer_id)->orders()->latest()->first())) {
			return $this->errorResponse('No order found', 404);
		}
		return $this->successResponse('Last order successfully fetched', $lastOrder);
	}

	public function restore()
	{
		//auth()->refresh();
		if (!$userProfile = auth()->user()) {
			return $this->errorResponse('No User found', 401);
		}
		$id = $userProfile->id;
		try {
			if (!$customer_data = Customer::findOrFail($id)) {
				$userProfile = new CustomerResource($customer_data);
			}
		} catch (Exception $e) {
		}
		return $this->successResponse('User Profile successfully fetched', $userProfile);


	}
}
