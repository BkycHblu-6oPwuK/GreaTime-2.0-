<?php

namespace App\Http\Requests\Main;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'email' => ['required','email','unique:mailing,email'],
        ];
    }

    public function messages(){
        return [
            'email.required' => 'Это поле обязательно для заполнения',
            'email.email' => 'Ожидается email адресс',
            'email.unique' => 'Такой email уже занесен в рассылку',
        ];
    }
}
