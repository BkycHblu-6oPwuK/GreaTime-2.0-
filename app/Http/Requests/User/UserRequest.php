<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => ['required','string'],
            'surname' => ['nullable','string'],
            'tel' => 'required|string|unique:users,tel,' . auth()->user()->id,
            'email' => 'required|string|email|unique:users,email,' . auth()->user()->id,
            'street' => ['nullable','string'],
            'city' => ['nullable','string'],
            'region' => ['nullable','string'],
            'postal_code' => ['nullable','string'],
            'country' => ['nullable','string'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Это поле необходимо для заполнения',
            'name.string' => 'Данные должны соответствовать строчному типу',
            'email.required' => 'Это поле необходимо для заполнения',
            'email.string' => 'Данные должны соответствовать строчному типу',
            'email.email' => 'Ваша почта должна соответствовать mail@some.domain',
            'email.unique' => 'Пользователь с таким email уже зарегистрирован',
            'tel.required' => 'Это поле необходимо для заполнения',
            'tel.string' => 'Данные должны соответствовать строчному типу',
            'tel.unique' => 'Пользователь с таким номером телефона уже зарегистрирован',
        ];
    }
}
