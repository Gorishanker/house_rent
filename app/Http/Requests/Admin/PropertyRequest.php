<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PropertyRequest extends FormRequest
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
        if (!request()->is('admin/properties/create')) {
            return [
                'title' => 'required',
                'rent' => 'required',
                'address' => 'required',
                'size' => 'required',
                'room_category' => 'required',
                'additional_facilities' => 'required',
                'apt_overview' => 'required',
                'features' => 'required',
            ];
        } else {
            return [
                'title' => 'required',
                'rent' => 'required',
                'address' => 'required',
                'size' => 'required',
                'room_category' => 'required',
                'additional_facilities' => 'required',
                'apt_overview' => 'required',
                'features' => 'required',
            ];
        }

    }
    public function messages()
    {
        return [
            // 'title.required' => __('validation.required', ['attribute' => 'Title']),
            // 'name.required' => __('validation.required', ['attribute' => 'Name']),
            // 'quantity.required' => __('validation.required', ['attribute' => 'Quantity']),
            // 'price.required' => __('validation.required', ['attribute' => 'Price']),
        ];
    }
}
