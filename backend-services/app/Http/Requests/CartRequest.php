<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CartRequest extends FormRequest
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
            'buyer_id'   => 'required',
            'seller_id'  => 'required|max:255',
            'product_id' => 'required',
            'quantity'   => 'required',
        ];
    }

    public function messages()
    {
        return [
            'buyer_id.required' => 'Buyer ID is missing.',
            'seller_id.required' => 'Seller ID is required.',
            'product_id.required' => 'Product ID is required.',
            'quantity.required' => 'Quantity is required.',
        ];
    }
}
