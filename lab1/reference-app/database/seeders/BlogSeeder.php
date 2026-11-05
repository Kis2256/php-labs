<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    public function run(): void
    {
        $categories = [];

        foreach ([
            'Новини' => 'Новини магазину та ринку 3D-друку',
            'Огляди принтерів' => 'Огляди та порівняння моделей',
            'Поради з друку' => 'Практичні поради щодо матеріалів і налаштувань',
        ] as $name => $info) {
            $categories[$name] = Category::firstOrCreate(
                ['category_name' => $name],
                ['category_info' => $info]
            );
        }

        $posts = [
            ['Новини', 'У наявності нова партія Creality K1C', 'Закриті CoreXY-принтери знову на складі potuzhnoprint.ua.'],
            ['Огляди принтерів', 'Огляд Bambu Lab A1 mini: компактний і швидкий', 'Що вміє найменший принтер Bambu Lab та кому він підійде.'],
            ['Поради з друку', 'PLA чи PETG: який філамент обрати', 'Порівнюємо міцність, температуру друку та складність роботи з матеріалами.'],
            ['Огляди принтерів', 'Prusa MK4S проти Creality K1C', 'Порівняння двох популярних FDM-принтерів за швидкістю та якістю.'],
            ['Поради з друку', 'Як налаштувати перший шар без помилок', 'Калібрування столу, висота сопла та температура першого шару.'],
            ['Новини', 'Знижки на фотополімерні смоли', 'До кінця місяця діють знижки на смоли Elegoo та Anycubic.'],
            ['Поради з друку', 'Як зберігати філамент, щоб він не вбирав вологу', 'Сушіння, герметичні контейнери та силікагель.'],
            ['Огляди принтерів', 'Що таке SLA-друк і кому він потрібен', 'Фотополімерний друк для мініатюр, ювелірних моделей і стоматології.'],
        ];

        foreach ($posts as $i => [$category, $title, $description]) {
            Blog::updateOrCreate(
                ['title' => $title],
                [
                    'description' => $description,
                    'text' => $description . "\n\nПовний текст матеріалу №" . ($i + 1) . ' для блогу potuzhnoprint.ua: деталі, поради та приклади налаштувань.',
                    'category_id' => $categories[$category]->category_id,
                    'user_id' => null,
                ]
            );
        }
    }
}