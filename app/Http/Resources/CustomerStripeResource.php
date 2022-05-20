<?php

namespace App\Http\Resources;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

class CustomerStripeResource extends JsonResource
{
	/**
	 * Transform the resource into an array.
	 *
	 * @param \Illuminate\Http\Request $request
	 * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
	 */
	public function toArray($request)
	{
		//return parent::toArray($request);
		//$auth = auth()->user();
		$auth = new CustomerResource (User::find($this->id));

		return [
			[
				'name' => $auth->name,
				'email' => $auth->email,
				'phone' => $this->phone,
				'address' => $this->address,

			]

		];
	}
}
