<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

class CustomerInvoiceResource extends JsonResource
{

    public function toArray($request)
    {

        $auth = User::find($this->id);
        //$orders = OrderResource::collection($this->orders);
        return [
            'name' => $auth->name,
            'address' => $this->address,
        ];
    }
}
