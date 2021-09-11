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
            return redirect()->route('cart');;
        }

        return [
            'name' => 'required|alpha|min:2|max:255',
            'phone' => 'required|numeric|min:15',
            'address' => 'required|min:6|max:255',
            'email' => 'required|email',

        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Правильно заполните поле имя!',
            'phone.required'  => 'Введите номер телефона!',
            'address.required'  => 'Введите адрес доставки!',
            'email.required' => 'Введите корректный емайл',
            'validation.numeric' => 'Введите только числовое значение',
        ];
        // return [
        //     'name.required' => 'Enter name how can I call you!',
        //     'phone.required'  => 'Enter the number for recall!',
        //     'address.required'  => 'Enter where you want to deliver!',
        //     'email.required' => 'Enter the correct email!',
        // ];
    }
}
