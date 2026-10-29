<?php

namespace App\Http\Requests;

use App\Enums\TechnologyEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PrinterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:100'],
            'brand' => ['required', 'string', 'max:50'],
            'technology' => ['required', Rule::enum(TechnologyEnum::class)],
            'price' => ['required', 'numeric', 'min:0', 'max:1000000'],
            'quantity' => ['required', 'integer', 'min:0', 'max:10000'],
            'description' => ['nullable', 'string', 'max:2000'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Вкажіть назву моделі.',
            'name.max' => 'Назва не може перевищувати 100 символів.',
            'brand.required' => 'Вкажіть виробника.',
            'brand.max' => 'Назва виробника не може перевищувати 50 символів.',
            'technology.required' => 'Оберіть технологію друку.',
            'technology.enum' => 'Оберіть технологію зі списку.',
            'price.required' => 'Вкажіть ціну.',
            'price.numeric' => 'Ціна має бути числом.',
            'price.min' => 'Ціна не може бути від\'ємною.',
            'price.max' => 'Ціна не може перевищувати 1 000 000 грн.',
            'quantity.required' => 'Вкажіть кількість на складі.',
            'quantity.integer' => 'Кількість має бути цілим числом.',
            'quantity.min' => 'Кількість не може бути від\'ємною.',
            'quantity.max' => 'Кількість не може перевищувати 10 000.',
            'description.max' => 'Опис не може перевищувати 2000 символів.',
        ];
    }
}