<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class SaveProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if (auth()->user()->role === 'admin') {
            return true;
        }
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title'         => 'required|max:255',
            'price'         => 'required',
            'sku'           => 'required',
            'status'        => 'required',
            'sub_category'  => 'required',
            'orientation'   => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required'  => 'Title is required.',
            'price.required'  => 'Price is requred',
            'sku.required'    => 'Sku is required',
            'status.required' => 'Status is required',
            'sub_category.required' => 'Category is required',
            'orientation.required' => 'Orientation is required',
        ];
    }
}
