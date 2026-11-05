<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PrinterTranslationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:150'],
            'description' => ['nullable', 'string', 'max:2000'],
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Вкажіть заголовок.',
            'title.max' => 'Заголовок не може перевищувати 150 символів.',
            'description.max' => 'Опис не може перевищувати 2000 символів.',
        ];
    }
}