<?php

namespace App\Http\Requests\Busket;

use Illuminate\Foundation\Http\FormRequest;

class PromokodeRequest extends FormRequest
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
            'name' => ['required','string','exists:promokode,name'],
        ];
    }
    
    public function messages()
    {
        return[
            'name.required' => 'Поле обязательно для заполнения',
            'name.string' => 'Тип должен быть строковым',
            'name.exists' => 'Промокода не существует',
        ];
    }
}
