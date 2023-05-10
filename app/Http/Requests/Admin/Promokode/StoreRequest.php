<?php

namespace App\Http\Requests\Admin\Promokode;

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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|unique:promokode,name',
            'percent' => 'required|integer',
            'products' => 'required|array',
            'products.*' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Это поле необходимо для заполнения',
            'name.string' => 'Данные должны соответствовать строчному типу',
            'name.unique' => 'Такой промокод уже существует',
            'percent.required' => 'Это поле необходимо для заполнения',
            'percent.integer' => 'Данные должны соответствовать числовому типу',
            'products.*.required' => 'Хотя бы один товар должен быть выбран',
            'products.required' => 'Хотя бы один товар должен быть выбран',
        ];
    }
    
}
