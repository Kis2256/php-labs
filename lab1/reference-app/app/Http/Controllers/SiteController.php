<?php

namespace App\Http\Controllers;

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

    public function catalog(string $category)
    {
        $categories = [
            'printers' => ['icon' => '🖨️', 'title' => '3D-принтери', 'text' => 'FDM та SLA-принтери для дому, навчання й виробництва.'],
            'filament' => ['icon' => '🧵', 'title' => 'Філамент', 'text' => 'PLA, PETG, ABS, TPU та інженерні пластики різних кольорів.'],
            'resin' => ['icon' => '🧪', 'title' => 'Смоли', 'text' => 'Фотополімерні смоли для деталізованого друку.'],
            'parts' => ['icon' => '⚙️', 'title' => 'Запчастини', 'text' => 'Сопла, столи, хотенди, ремені та інші комплектуючі.'],
        ];

        return view('site.catalog', $categories[$category]);
    }

    public function printService()
    {
        $title = 'Друк на замовлення';

        $services = [
            ['icon' => '🧩', 'name' => 'Друк за вашою моделлю', 'text' => 'Друкуємо деталі з файлів STL, OBJ та 3MF.', 'price' => 'від 150 грн'],
            ['icon' => '⚙️', 'name' => 'Технічні деталі', 'text' => 'Кріплення, шестерні, корпуси та запчастини з міцних пластиків.', 'price' => 'від 200 грн'],
            ['icon' => '🎨', 'name' => 'Фігурки та сувеніри', 'text' => 'Деталізований друк смолою для мініатюр і подарунків.', 'price' => 'від 300 грн'],
            ['icon' => '📐', 'name' => '3D-моделювання', 'text' => 'Створимо модель за кресленням, фото або ескізом.', 'price' => 'від 500 грн'],
        ];

        $materials = ['PLA', 'PETG', 'ABS', 'TPU', 'Nylon', 'Фотополімерна смола'];

        $topics = PrintOrderRequest::TOPICS;

        return view('site.print', compact('title', 'services', 'materials', 'topics'));
    }

        public function printServiceStore(PrintOrderRequest $request)
    {
        $data = $request->validated();

        Mail::to(config('mail.from.address'))->send(new PrintOrderMail($data));

        return view('site.print-confirm', $data);
    }
}