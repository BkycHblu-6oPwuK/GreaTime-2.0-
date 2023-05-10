<?php

namespace App\Http\Requests\Admin\Products\characteristic;

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
            'name_chars' => 'required|array',
            'values' => 'required|array',
            'name_chars.*' => 'required',
            'values.*' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name_chars.*.required' => 'Это поле необходимо для заполнения',
            'name_chars.required' => 'Это поле необходимо для заполнения',
        ];
    }
    
}
