<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

class CustomerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        //$auth = auth()->user();
        $auth = User::find($this->id);
        $orders = OrderResource::collection($this->orders);
        return [
            'id' => $this->id,
            'name' => $auth->name,
            'email' => $auth->email,
            'address' => $this->address,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'orders' => $orders
        ];
    }
}
