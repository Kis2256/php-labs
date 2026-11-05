<?php

namespace App\Http\Requests;

use App\Enums\TopicEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PrintOrderRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:2', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'topic' => ['required', Rule::enum(TopicEnum::class)],
            'message' => ['required', 'string', 'min:10', 'max:2000'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Вкажіть ваше ім\'я.',
            'name.min' => 'Ім\'я має містити щонайменше 2 символи.',
            'name.max' => 'Ім\'я не може перевищувати 255 символів.',
            'email.required' => 'Вкажіть email для зворотного зв\'язку.',
            'email.email' => 'Email введено некоректно.',
            'email.max' => 'Email не може перевищувати 255 символів.',
            'topic.required' => 'Оберіть тему звернення.',
            'topic.enum' => 'Оберіть тему зі списку.',
            'message.required' => 'Опишіть ваше замовлення або питання.',
            'message.min' => 'Повідомлення має містити щонайменше 10 символів.',
            'message.max' => 'Повідомлення не може перевищувати 2000 символів.',
        ];
    }
}