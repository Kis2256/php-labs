<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:200'],
            'description' => ['nullable', 'string', 'max:500'],
            'text' => ['nullable', 'string'],
            'category_id' => [
                'nullable',
                'exists:category,category_id',
            ],

            'filters' => ['sometimes', 'array'],
            'filters.*' => [
                'integer',
                'distinct',
                'exists:filter,filter_id',
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Вкажіть заголовок запису.',
            'title.max' => 'Заголовок не може перевищувати 200 символів.',
            'description.max' => 'Короткий опис не може перевищувати 500 символів.',
            'category_id.exists' => 'Оберіть категорію зі списку.',
            'filters.array' => 'Мітки мають бути переданими списком.',
            'filters.*.integer' => 'Некоректний ідентифікатор мітки.',
            'filters.*.distinct' => 'Мітки не повинні повторюватись.',
            'filters.*.exists' => 'Обрана мітка не існує.',
        ];
    }
}