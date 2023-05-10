<?php

namespace App\Http\Requests\Admin\Subcategory_2;

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
            'id_category' => 'required|integer|exists:category,id',
            'id_sub_cat' => 'required|integer|exists:subcategory,id',
            'name' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Это поле необходимо для заполнения',
            'name.string' => 'Данные должны соответствовать строчному типу',
            'id_category.required' => 'Это поле необходимо для заполнения',
            'id_category.integer' => 'Данные должны соответствовать целочисленному типу',
            'id_category.exists' => 'Выбранная категория не существует',
            'id_sub_cat.required' => 'Подкатегория обязательна',
            'id_sub_cat.integer' => 'Данные должны соответствовать целочисленному типу',
            'id_sub_cat.exists' => 'Выбранная категория не существует',
        ];
    }
}
