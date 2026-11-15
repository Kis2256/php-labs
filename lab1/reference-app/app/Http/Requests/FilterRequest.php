<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class FilterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'filter_name' => [
                'required',
                'string',
                'max:100',
                Rule::unique('filter', 'filter_name')
                    ->ignore($this->route('filter')?->getKey(), 'filter_id'),
            ],
            'filter_description' => ['nullable', 'string', 'max:1000'],
        ];
    }

    public function messages(): array
    {
        return [
            'filter_name.required' => 'Вкажіть назву мітки.',
            'filter_name.max' => 'Назва мітки не може перевищувати 100 символів.',
            'filter_name.unique' => 'Така мітка вже існує.',
            'filter_description.max' => 'Опис не може перевищувати 1000 символів.',
        ];
    }
}