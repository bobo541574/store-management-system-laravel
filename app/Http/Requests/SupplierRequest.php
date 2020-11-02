<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SupplierRequest extends FormRequest
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
            'name'  => 'required',
            'logo'  => 'required',
            'row.*.email'  => 'required',
            'row.*.phone'  => 'required',
            'row.*.address'  => 'required',
            'row.*.township'  => 'required',
            'row.*.city'  => 'required',
            'row.*.state'  => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Company Name is required.',
            'logo.required' => 'Company Logo is required.',
            'row.*.email.required' => 'Company Email is required.',
            'row.*.phone.required' => 'Company Phone is required.',
            'row.*.address.required' => 'Company Address is required.',
            'row.*.township.required' => 'Company Township is required.',
            'row.*.city.required' => 'Company City is required.',
            'row.*.state.required' => 'Company State is required.',
        ];
    }
}