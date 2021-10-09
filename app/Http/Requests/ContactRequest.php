<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'name' => 'required|min:2|max:20',
            'phone' => 'required|numeric',
            'email' => 'required|email',
            'message' => 'required|max:500',
        ];
    }
    public function messages()
    {
        return [
            'required' => 'Поле :attribute обязательно для ввода',
        ];
    }
}
