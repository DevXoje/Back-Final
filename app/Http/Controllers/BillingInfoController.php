<?php

namespace App\Http\Controllers;

use App\Models\Billing_Info;
use App\Http\Requests\StoreBilling_InfoRequest;
use App\Http\Requests\UpdateBilling_InfoRequest;

class BillingInfoController extends Controller
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
     * @param  \App\Http\Requests\StoreBilling_InfoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBilling_InfoRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Billing_Info  $billing_Info
     * @return \Illuminate\Http\Response
     */
    public function show(Billing_Info $billing_Info)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Billing_Info  $billing_Info
     * @return \Illuminate\Http\Response
     */
    public function edit(Billing_Info $billing_Info)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBilling_InfoRequest  $request
     * @param  \App\Models\Billing_Info  $billing_Info
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBilling_InfoRequest $request, Billing_Info $billing_Info)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Billing_Info  $billing_Info
     * @return \Illuminate\Http\Response
     */
    public function destroy(Billing_Info $billing_Info)
    {
        //
    }
}
