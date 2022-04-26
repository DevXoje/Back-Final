<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;

class CustomerController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::all();
        if (!$customers) {
            return $this->errorResponse('No customers found', 404);
        }
        return $this->successResponse('Customers successfully fetched', $customers);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCustomerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCustomerRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        if (!$customer = Customer::find($id)) {
            return $this->errorResponse(['error' => 'Customer Not Found'], 404);
        }
        return $this->successResponse('Customer successfully retrieved.', $customer);
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCustomerRequest  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        if (!$customer = Customer::find($id)) {
            return $this->errorResponse(['error' => 'Customer Not Found'], 404);
        }
        $customer->delete();
        return $this->successResponse('Customer successfully deleted.', $customer);
    }

    public function orders(int $customer_id)
    {
        if (!$orders = Customer::find($customer_id)->orders) {
            return $this->errorResponse('No orders found', 404);
        }
        return $this->successResponse('Orders successfully fetched', $orders);
    }
    public function order(int $customer_id, int $order_id)
    {

        if (!$order = Customer::find($customer_id)->orders()->find($order_id)) {
            return $this->errorResponse('No order found', 404);
        }
        return $this->successResponse('Order successfully fetched', $order);
    }
    public function lastOrder(int $customer_id)
    {
        if (!$lastOrder = Customer::find($customer_id)->orders()->latest()->first()) {
            return $this->errorResponse('No order found', 404);
        }
        return $this->successResponse('Last order successfully fetched', $lastOrder);
    }
    public function profile()
    {
        //return auth()->user();
        if (!$userProfile = auth()->user()) {
            return $this->errorResponse('No User found', 404);
        }
        return $this->successResponse('User Profile successfully fetched', $userProfile);
    }
}
