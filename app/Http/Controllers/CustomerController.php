<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Customer::all();
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
        $code = 200;
        $message = "Product not found";
        $payload = ['message' => $message];
        $product = Customer::find($id);
        if ($product) {
            $payload =  $product;
        } else {
            $code = 400;
        }
        return response()->json($payload, $code);
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
        $product = Customer::find($id);
        $code = 404;
        $messageNotFound = "Customer not found";
        $messageFounded = "Customer " . $id . " deleted";
        $payload = ['message' => ''];
        if (!$product) {
            $payload = ['message' => $messageNotFound];
            $code = 404;
        } else {
            $product->delete();
            $payload = ['message' => $messageFounded];
            $code = 204;
        }
        return response()->json($payload, $code);
    }

    public function orders(int $customer_id)
    {
        /* $orders=new OrderController();
        return $orders->show($customer_id); */
        return Customer::find($customer_id)->orders;
    }
    public function order(int $customer_id, int $order_id)
    {
        return Customer::find($customer_id)->orders()->find($order_id);
    }
    public function lastOrder(int $customer_id)
    {
        return Customer::find($customer_id)->orders()->latest()->first();
    }
}
