<?php

namespace App\Http\Controllers;

use App\Enums\CategoryEnum;
use App\Enums\TopicEnum;
use App\Http\Requests\EntryRequest;
use App\Http\Requests\PrintOrderRequest;
use App\Mail\PrintOrderMail;
use Illuminate\Support\Facades\Mail;

class SiteController extends Controller
{
    public function say(string $message = 'Привіт')
    {
        return view('site.say', ['message' => $message]);
    }

    public function entry()
    {
        return view('site.entry');
    }

    public function entryStore(EntryRequest $request)
    {
        return view('site.entry-confirm', $request->validated());
    }

    public function catalog(CategoryEnum $category)
    {
        return view('site.catalog', ['category' => $category]);
    }

    public function printOrder()
    {
        $title = 'Друк на замовлення';

        $services = [
            ['icon' => '🧩', 'name' => 'Друк за вашою моделлю', 'text' => 'Друкуємо деталі з файлів STL, OBJ та 3MF.', 'price' => 'від 150 грн'],
            ['icon' => '⚙️', 'name' => 'Технічні деталі', 'text' => 'Кріплення, шестерні, корпуси та запчастини з міцних пластиків.', 'price' => 'від 200 грн'],
            ['icon' => '🎨', 'name' => 'Фігурки та сувеніри', 'text' => 'Деталізований друк смолою для мініатюр і подарунків.', 'price' => 'від 300 грн'],
            ['icon' => '📐', 'name' => '3D-моделювання', 'text' => 'Створимо модель за кресленням, фото або ескізом.', 'price' => 'від 500 грн'],
        ];

        $materials = ['PLA', 'PETG', 'ABS', 'TPU', 'Nylon', 'Фотополімерна смола'];

        $topics = TopicEnum::cases();

        return view('site.print', compact('title', 'services', 'materials', 'topics'));
    }

    public function printOrderStore(PrintOrderRequest $request)
    {
        $data = $request->validated();
        $data['topic'] = TopicEnum::from($data['topic'])->label();

        Mail::to(config('mail.from.address'))->send(new PrintOrderMail($data));

        return view('site.print-confirm', $data);
    }
}