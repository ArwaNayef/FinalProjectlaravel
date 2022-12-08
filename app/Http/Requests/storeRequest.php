<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storeRequest extends FormRequest
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
            'name' => 'Required|string',
            'address' => 'Required',
            'phone' => 'Required',
            'logo' => 'mimes:png,jpg,jpeg,gif|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'name is required',
            'address.required' => 'address is required',
            'phone.required' => 'phone is required',
            'logo.required' => 'must send an image',
        ];
    }
}
