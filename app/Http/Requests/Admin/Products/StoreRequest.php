<?php

namespace App\Http\Requests\Admin\Products;

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
            'name' => 'required|string|unique:products,name',
            'description' => 'required|string',
            'brand' => 'required|string',
            'article' => 'required|string',
            'amount' => 'required|integer',
            'price' => 'required|integer',
            'image' => 'required|file',
            'id_category' => 'required|integer|exists:category,id',
            'id_sub_cat' => 'nullable|integer|exists:subcategory,id',
            'id_sub_sub_cat' => 'nullable|integer|exists:sub_subcategory,id',
            'sizes' => 'sometimes|required',
            'amounts' => 'sometimes|required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Это поле необходимо для заполнения',
            'name.string' => 'Данные должны соответствовать строчному типу',
            'name.unique' => 'Продукт с таким названием уже существует',
            'description.required' => 'Это поле необходимо для заполнения',
            'description.string' => 'Данные должны соответствовать строчному типу',
            'brand.required' => 'Это поле необходимо для заполнения',
            'brand.string' => 'Данные должны соответствовать строчному типу',
            'article.required' => 'Это поле необходимо для заполнения',
            'article.string' => 'Данные должны соответствовать строчному типу',
            'amount.required' => 'Это поле необходимо для заполнения',
            'amount.integer' => 'Данные должны соответствовать целочисленному типу',
            'price.required' => 'Это поле необходимо для заполнения',
            'price.integer' => 'Данные должны соответствовать целочисленному типу',
            'image.required' => 'Необходимо выбрать изображение для загрузки',
            'image.file' => 'Изображение должно быть файлом',
            'id_category.required' => 'Это поле необходимо для заполнения',
            'id_category.integer' => 'Данные должны соответствовать целочисленному типу',
            'id_category.exists' => 'Выбранная категория не существует',
            'id_sub_cat.integer' => 'Данные должны соответствовать целочисленному типу',
            'id_sub_cat.exists' => 'Выбранная подкатегория не существует',
            'id_sub_sub_cat.integer' => 'Данные должны соответствовать целочисленному типу',
            'id_sub_sub_cat.exists' => 'Выбранная под-подкатегория не существует',
            'sizes.required' => 'Поля c размерами товаров обязательны для заполнения',
            'amount.required' => 'Поля с кол-вом товара обязательны для заполнения',
        ];
    }
    
}
