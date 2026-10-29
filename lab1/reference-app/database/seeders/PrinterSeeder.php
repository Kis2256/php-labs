<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PrinterSeeder extends Seeder
{
    public function run(): void
    {
        $printers = [
            ['Ender-3 V3 SE', 'Creality', 'FDM', 8999, 12, 'Бюджетний FDM-принтер з автокалібруванням столу, область друку 220×220×250 мм.'],
            ['Ender-3 V3 KE', 'Creality', 'FDM', 11499, 7, 'Швидкісний FDM-принтер з прямим екструдером та Wi-Fi.'],
            ['K1C', 'Creality', 'FDM', 23999, 4, 'Закритий CoreXY-принтер для друку інженерними пластиками.'],
            ['K1 Max', 'Creality', 'FDM', 34999, 2, 'Великий закритий CoreXY-принтер, область друку 300×300×300 мм.'],
            ['Halot-Mage 8K', 'Creality', 'SLA', 15999, 5, 'Фотополімерний принтер з екраном 8K для мініатюр.'],
            ['CR-10 SE', 'Creality', 'FDM', 17999, 3, 'FDM-принтер з великою областю друку та автокалібруванням.'],
            ['MK4S', 'Prusa', 'FDM', 39999, 3, 'Надійний FDM-принтер з датчиком навантаження на соплі.'],
            ['MINI+', 'Prusa', 'FDM', 19999, 6, 'Компактний FDM-принтер для дому та навчання.'],
            ['A1 mini', 'Bambu Lab', 'FDM', 10999, 10, 'Компактний принтер з повною автоматизацією налаштувань.'],
            ['P1S', 'Bambu Lab', 'FDM', 31999, 4, 'Закритий швидкісний принтер з підтримкою багатоколірного друку.'],
            ['Kobra 3', 'Anycubic', 'FDM', 13999, 8, 'FDM-принтер з підтримкою чотирьох кольорів.'],
            ['Photon Mono M7', 'Anycubic', 'SLA', 14499, 6, 'Фотополімерний принтер для деталізованих моделей.'],
            ['Saturn 4 Ultra', 'Elegoo', 'SLA', 21999, 3, 'Фотополімерний принтер з екраном 12K і підігрівом ванни.'],
            ['Neptune 4 Pro', 'Elegoo', 'FDM', 12499, 9, 'Швидкісний FDM-принтер з прошивкою Klipper.'],
        ];

        foreach ($printers as [$name, $brand, $technology, $price, $quantity, $description]) {
            DB::table('printers')->insert([
                'name' => $name,
                'brand' => $brand,
                'technology' => $technology,
                'price' => $price,
                'quantity' => $quantity,
                'description' => $description,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}