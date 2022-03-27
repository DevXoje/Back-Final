<?php

namespace App\Http\Controllers;

use App\Models\Credit_Card;
use App\Http\Requests\StoreCredit_CardRequest;
use App\Http\Requests\UpdateCredit_CardRequest;

class CreditCardController extends Controller
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
     * @param  \App\Http\Requests\StoreCredit_CardRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCredit_CardRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Credit_Card  $credit_Card
     * @return \Illuminate\Http\Response
     */
    public function show(Credit_Card $credit_Card)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Credit_Card  $credit_Card
     * @return \Illuminate\Http\Response
     */
    public function edit(Credit_Card $credit_Card)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCredit_CardRequest  $request
     * @param  \App\Models\Credit_Card  $credit_Card
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCredit_CardRequest $request, Credit_Card $credit_Card)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Credit_Card  $credit_Card
     * @return \Illuminate\Http\Response
     */
    public function destroy(Credit_Card $credit_Card)
    {
        //
    }
}
