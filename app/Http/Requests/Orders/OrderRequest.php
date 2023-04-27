<?php

namespace App\Http\Requests\Orders;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'shipping_methods' => ['required'],
            'street' => ['nullable','string','max:255'],
            'home' => ['nullable','string','max:255'],
            'entrance' => ['nullable','string','max:255'],
            'flat' => ['nullable','string','max:255'],
            'name' => ['required','string','max:255'],
            'surname' => ['required','string','max:255'],
            'telephone' => ['required','string','max:255'],
            'email' => ['required','string','max:255','email'],
            'payment_method' => ['required'],
            'price_itog' => ['required'],
        ];
    }

    public function messages(){
        return [
            'shipping_methods.required' => 'Это поле обязательно для заполнения',
            'name.required' => 'Это поле обязательно для заполнения',
            'surname.required' => 'Это поле обязательно для заполнения',
            'telephone.required' => 'Это поле обязательно для заполнения',
            'email.required' => 'Это поле обязательно для заполнения',
            'payment_method.required' => 'Это поле обязательно для заполнения',
            'email.email' => 'email должен быть валидным',
        ];
    }
}
