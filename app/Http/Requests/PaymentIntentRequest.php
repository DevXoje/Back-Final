<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaymentIntentRequest extends FormRequest
{
	public function rules(): array
	{
		return [
			
			"amount" => "numeric",
			"currency" => "string",
			"automatic_payment_methods" => "array",
			"customer" => "string",
			"description" => "string",
			"payment_method" => "array",
		];
	}

	public function authorize(): bool
	{
		return true;
	}
}
