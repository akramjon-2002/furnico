<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|integer',
            'description' => 'required|string',
            'stock_quantity' => 'required|integer',
            'is_active' => 'required',
            'attributes' => 'array',
            'images' => 'required',
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];

    }


    public function messages()
    {
        return [
            'name.required' => 'Please enter the product name.',
            'category_id.required' => 'Please select a product category.',
            'category_id.exists' => 'The selected category is invalid.',
            'price.required' => 'Please enter the product price.',
            'price.integer' => 'The price must be a whole number.',
            'description.required' => 'Please enter a product description.',
            'stock_quantity.required' => 'Please enter the stock quantity.',
            'stock_quantity.integer' => 'The stock quantity must be a whole number.',
            'is_active.required' => 'Please indicate whether the product is active.',
            'attributes.*.name.required' => 'Each attribute must have a name.',
            'attributes.*.value.required' => 'Each attribute must have a value.',
            'images.required' => 'Please upload at least one product image.',
            'images.*.image' => 'Please upload only image files.',
            'images.*.mimes' => 'Allowed image types are: JPEG, PNG, JPG, and GIF.',
            'images.*.max' => 'Image files must be less than 2MB.',
        ];
    }

}
