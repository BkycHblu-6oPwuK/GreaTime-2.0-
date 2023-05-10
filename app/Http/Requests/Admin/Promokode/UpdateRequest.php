<?php

namespace App\Http\Requests\Admin\Promokode;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'name' => 'required|string',
            'percent' => 'required|integer',
            'status' => 'integer'
        ];
    }
    
    public function messages()
    {
        return [
            'name.required' => 'Это поле необходимо для заполнения',
            'name.string' => 'Данные должны соответствовать строчному типу',
            'percent.required' => 'Это поле необходимо для заполнения',
            'percent.integer' => 'Данные должны соответствовать числовому типу',
            'status.integer' => 'Данные должны соответствовать числовому типу',
        ];
    }
}
