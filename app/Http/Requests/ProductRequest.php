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
     * @return array
     */
    public function rules()
    {
        $rules = [
            'arrived'   => 'required',
            'product_code'   => 'required',
            'name'   => 'required',
            'brand'   => 'required',
            'supplier'   => 'required',
            'row.*.color'   => 'required',
            'row.*.size'   => 'required',
            'row.*.quantity'   => 'required',
            'row.*.price'   => 'required',
            'row.*.cost'   => 'required',
            'row.*.status'   => 'required',
            'row.*.photo'   => 'if_else:()required',
        ];

        for ($i = 0; $i < count(request('row')); $i++) {
            $photo = (request('row')[$i]['old_photo'] ?? 'photo');
            $rules = [
                'arrived'   => 'required',
                'product_code'   => 'required',
                'name'   => 'required',
                'brand'   => 'required',
                'supplier'   => 'required',
                'row.*.color'   => 'required',
                'row.*.size'   => 'required',
                'row.*.quantity'   => 'required',
                'row.*.price'   => 'required',
                'row.*.cost'   => 'required',
                'row.*.status'   => 'required',
                'row.*.photo'   => 'required_with:photo',
            ];
            // $rules = [
            //     'arrived'   => 'required',
            //     'product_code'   => 'required',
            //     'name'   => 'required',
            //     'brand'   => 'required',
            //     'supplier'   => 'required',
            //     'row.*.color'   => 'required',
            //     'row.*.size'   => 'required',
            //     'row.*.quantity'   => 'required',
            //     'row.*.price'   => 'required',
            //     'row.*.cost'   => 'required',
            //     'row.*.status'   => 'required',
            // ];
            // if ($photo == 'photo') {
            //     array_push($rules, $rules["row.*.photo"] = 'required');
            // }
        }

        // dd($rules);

        return $rules;
    }

    public function messages()
    {
        return [
            'arrived.required' => 'Arrived date is required',
            'product_code.required' => 'Product code is required',
            'name.required' => 'name is required',
            'brand.required' => 'Brand is required',
            'supplier.required' => 'Supplier is required',
            'row.*.color.required' => 'Color is required',
            'row.*.size.required' => 'Size is required',
            'row.*.quantity.required' => 'Quantity is required',
            'row.*.price.required' => 'Price is required',
            'row.*.cost.required' => 'Cost is required',
            'row.*.status.required' => 'Status is required',
            'row.*.photo.required' => 'Photo is required',
        ];
    }
}