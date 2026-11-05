<?php

namespace Database\Seeders;

use App\Models\Printer;
use App\Models\PrinterTranslation;
use Illuminate\Database\Seeder;

class PrinterTranslationSeeder extends Seeder
{
    public function run(): void
    {
        // модель => [мова => [заголовок, опис]]
        $data = [
            'Ender-3 V3 SE' => [
                'uk' => ['Бюджетний FDM-принтер для початківців', 'Бюджетний FDM-принтер з автокалібруванням столу, область друку 220×220×250 мм.'],
                'en' => ['Budget FDM printer for beginners', 'Entry-level FDM printer with automatic bed leveling and a 220×220×250 mm build volume.'],
            ],
            'Ender-3 V3 KE' => [
                'uk' => ['Швидкісний FDM-принтер з Wi-Fi', 'Швидкісний FDM-принтер з прямим екструдером та Wi-Fi.'],
                'en' => ['Fast FDM printer with Wi-Fi', 'High-speed FDM printer with a direct drive extruder and Wi-Fi.'],
            ],
            'K1C' => [
                'uk' => ['Закритий CoreXY для інженерних пластиків', 'Закритий CoreXY-принтер для друку інженерними пластиками.'],
                'en' => ['Enclosed CoreXY for engineering plastics', 'Enclosed CoreXY printer for printing with engineering-grade filaments.'],
            ],
            'K1 Max' => [
                'uk' => ['Великий закритий CoreXY-принтер', 'Великий закритий CoreXY-принтер, область друку 300×300×300 мм.'],
                'en' => ['Large enclosed CoreXY printer', 'Large enclosed CoreXY printer with a 300×300×300 mm build volume.'],
            ],
            'MK4S' => [
                'uk' => ['Надійний FDM-принтер від Prusa', 'Надійний FDM-принтер з датчиком навантаження на соплі.'],
                'en' => ['Reliable FDM printer from Prusa', 'Dependable FDM printer with a load-cell nozzle sensor.'],
            ],
            'MINI+' => [
                'uk' => ['Компактний принтер для дому та навчання', 'Компактний FDM-принтер для дому та навчання.'],
                'en' => ['Compact printer for home and education', 'Compact FDM printer for home and education.'],
            ],
            'A1 mini' => [
                'uk' => ['Компактний принтер з автоналаштуванням', 'Компактний принтер з повною автоматизацією налаштувань.'],
                'en' => ['Compact printer with automatic setup', 'Compact printer with fully automated calibration.'],
            ],
            'P1S' => [
                'uk' => ['Закритий швидкісний багатоколірний принтер', 'Закритий швидкісний принтер з підтримкою багатоколірного друку.'],
                'en' => ['Enclosed high-speed multicolor printer', 'Enclosed high-speed printer with multicolor printing support.'],
            ],
            'Halot-Mage 8K' => [
                'uk' => ['Фотополімерний принтер з екраном 8K', 'Фотополімерний принтер з екраном 8K для мініатюр.'],
            ],
            'CR-10 SE' => [
                'uk' => ['FDM-принтер з великою областю друку', 'FDM-принтер з великою областю друку та автокалібруванням.'],
            ],
            'Kobra 3' => [
                'uk' => ['FDM-принтер на чотири кольори', 'FDM-принтер з підтримкою чотирьох кольорів.'],
            ],
            'Photon Mono M7' => [
                'uk' => ['Фотополімерний принтер для деталізованих моделей', 'Фотополімерний принтер для деталізованих моделей.'],
            ],
            'Saturn 4 Ultra' => [
                'uk' => ['Фотополімерний принтер з екраном 12K', 'Фотополімерний принтер з екраном 12K і підігрівом ванни.'],
            ],
            'Neptune 4 Pro' => [
                'uk' => ['Швидкісний FDM-принтер на Klipper', 'Швидкісний FDM-принтер з прошивкою Klipper.'],
            ],
        ];

        foreach ($data as $name => $languages) {
            $printer = Printer::where('name', $name)->first();

            if (!$printer) {
                continue;
            }

            foreach ($languages as $locale => [$title, $description]) {
                PrinterTranslation::updateOrCreate(
                    ['printer_id' => $printer->id, 'locale' => $locale],
                    ['title' => $title, 'description' => $description]
                );
            }
        }
    }
}