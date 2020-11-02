<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'quantity'   => 'required',
            'name'   => 'required',
            'phone'   => 'required',
        ];
    }

    public function messages()
    {
        return [
            'quantity.required' => 'Quantity is required',
            'name.required' => 'Name is required',
            'phone.required' => 'Phone is required',
        ];
    }
}