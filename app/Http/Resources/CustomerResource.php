<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JsonSerializable;

class CustomerResource extends JsonResource
{
	/**
	 * Transform the resource into an array.
	 *
	 * @param Request $request
	 * @return array|Arrayable|JsonSerializable
	 */
	public function toArray($request)
	{

		$auth = User::find($this->id);
		//$orders = OrderResource::collection($this->orders);
		return [
			'id' => $this->id,
			'stripe_id' => $this->stripe_id,
			'name' => $auth->name,
			'email' => $auth->email,
			'phone' => $this->phone,
			'address' => $this->address,
			'created_at' => $this->created_at,
			'updated_at' => $this->updated_at,
			'official_doc' => $this->official_doc,
			//'orders' => $orders
		];
	}
}
