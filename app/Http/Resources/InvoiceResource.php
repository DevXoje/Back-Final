<?php

namespace App\Http\Resources;

use App\Models\Customer;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

class InvoiceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
		$customer =CustomerResource:: Customer::find($this->customer_id);

		return [
			'id' => $this->id,
			'customer' => $customer->name,
			'user' => User::find($this->user_id)->name,
			'NIF' =>$this->user_id,
			'operation_date' => $this->created_at,
			'expedition_date' => $this->update_at,
			'address' => $customer->address,
			'amount' => Order::find($this->order_id)->amount,
			//'status' => $this->status,
		];
	}

}
