<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SignUpReq extends FormRequest
{
	#var string $name, $email, $password;
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'name' => 'required|string',
			'email' => 'required|string|email|unique:auth',
			'password' => 'required|string'
		];
	}

	/**
	 * Get the error messages for the defined validation rules.
	 *
	 * @return array
	 */
	public function messages()
	{
		return [
			'name.required' => 'The Title is Required',
			'email.min' => 'The Title must be At Least 5 characters',
			'password.required' => 'The Content is Required',
		];
	}
}
