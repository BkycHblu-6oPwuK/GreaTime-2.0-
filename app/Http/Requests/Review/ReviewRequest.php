<?php

namespace App\Http\Requests\Review;

use App\Models\Products;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ReviewRequest extends FormRequest
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
            'estimation' => ['required', 'numeric', 'min:1', 'max:5'],
            'plus' => ['required', 'string', 'min:20', 'max:5000'],
            'minus' => ['required', 'string', 'min:20', 'max:5000'],
            'comment' => ['required', 'string', 'min:20', 'max:5000'],
        ];
    }
    
    public function messages()
    {
        return [
            'estimation.required' => 'Поле оценки обязательно для заполнения',
            'estimation.numeric' => 'Поле оценки должно быть числом',
            'estimation.min' => 'Поле оценки должно быть не менее :min',
            'estimation.max' => 'Поле оценки должно быть не более :max',
            'plus.required' => 'Поле "Достоинства" обязательно для заполнения',
            'plus.string' => 'Поле "Достоинства" должно быть строкой',
            'plus.min' => 'Поле "Достоинства" должно быть не менее :min символов',
            'plus.max' => 'Поле "Достоинства" должно быть не более :max символов',
            'minus.required' => 'Поле "Недостатки" обязательно для заполнения',
            'minus.string' => 'Поле "Недостатки" должно быть строкой',
            'minus.min' => 'Поле "Недостатки" должно быть не менее :min символов',
            'minus.max' => 'Поле "Недостатки" должно быть не более :max символов',
            'comment.required' => 'Поле "Комментарий" обязательно для заполнения',
            'comment.string' => 'Поле "Комментарий" должно быть строкой',
            'comment.min' => 'Поле "Комментарий" должно быть не менее :min символов',
            'comment.max' => 'Поле "Комментарий" должно быть не более :max символов',
        ];
    }
    
}
