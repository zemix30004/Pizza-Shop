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
        if (request()->get('cancel_order')) {
            return [];
        }

        return [
            'name' => 'required|min:3|max:255',
            'phone' => 'required|numeric|min:9|max:20',
            'address' => 'required|min:6|max:255',
            'email' => 'required',
            'email' => 'required|email',

        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Enter name how can I call you!',
            'phone.required'  => 'Enter the number for recall!',
            'address.required'  => 'Enter where you want to deliver!',
            'email.required' => 'Enter the correct email!',
        ];
    }
}
