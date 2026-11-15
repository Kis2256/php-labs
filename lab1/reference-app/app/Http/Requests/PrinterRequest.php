<?php

namespace App\Http\Requests;

use App\Enums\TechnologyEnum;
use App\Models\Material;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Validator;

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

            'materials' => ['sometimes', 'array'],
            'materials.*' => [
                'integer',
                'distinct',
                'exists:materials,id',
            ],
        ];
    }

    /**
     * Матеріали мають відповідати технології друку принтера.
     */
    public function after(): array
    {
        return [
            function (Validator $validator) {
                if ($validator->errors()->isNotEmpty()) {
                    return;
                }

                $ids = $this->input('materials', []);

                if (! $ids) {
                    return;
                }

                $mismatch = Material::whereIn('id', $ids)
                    ->where('technology', '!=', $this->input('technology'))
                    ->exists();

                if ($mismatch) {
                    $validator->errors()->add(
                        'materials',
                        'Обрані матеріали не відповідають технології друку принтера.'
                    );
                }
            },
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
            'materials.array' => 'Матеріали мають бути переданими списком.',
            'materials.*.integer' => 'Некоректний ідентифікатор матеріалу.',
            'materials.*.distinct' => 'Матеріали не повинні повторюватись.',
            'materials.*.exists' => 'Обраний матеріал не існує.',
        ];
    }
}