<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
        if (request()->get('approve_register')) {
            return [];
        }

        return [
            'name' => 'required|alpha|min:2|max:255',
            'email' => 'required|email',
            'password' => 'required|min:6|max:255',
            'confirm password' => 'required|min:6|max:255',
        ];
    }
    public function messages()
    {
        return [
            'name' => 'required|alpha|min:2|max:255',
            'email' => 'required|email',
            'password' => 'required|min:6|max:255',
            'confirm password' => 'required|min:6|max:255',
        ];
    }
}
