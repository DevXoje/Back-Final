<?php

namespace App\Http\Controllers;

use App\Models\Order_Details;
use App\Http\Requests\StoreOrder_DetailsRequest;
use App\Http\Requests\UpdateOrder_DetailsRequest;

class OrderDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOrder_DetailsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrder_DetailsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order_Details  $order_Details
     * @return \Illuminate\Http\Response
     */
    public function show(Order_Details $order_Details)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order_Details  $order_Details
     * @return \Illuminate\Http\Response
     */
    public function edit(Order_Details $order_Details)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOrder_DetailsRequest  $request
     * @param  \App\Models\Order_Details  $order_Details
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrder_DetailsRequest $request, Order_Details $order_Details)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order_Details  $order_Details
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order_Details $order_Details)
    {
        //
    }
}
