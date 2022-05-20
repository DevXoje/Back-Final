<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateStripeCheckoutRequest extends FormRequest
{
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
            //

            "payment_method_types"=>"required",
            "line_items"=>"required",
            
            "success_url"=>"required",
            "cancel_url"=>"required",
            "mode"=>"required",
        ];
    }
}
