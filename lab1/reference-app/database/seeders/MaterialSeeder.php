<?php

namespace Database\Seeders;

use App\Models\Material;
use App\Models\Printer;
use Illuminate\Database\Seeder;

class MaterialSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            ['PLA', 'FDM', 'Базовий біопластик, простий у друці'],
            ['PETG', 'FDM', 'Міцний, стійкий до вологи'],
            ['ABS', 'FDM', 'Міцний, потребує закритої камери'],
            ['ASA', 'FDM', 'Стійкий до ультрафіолету'],
            ['TPU', 'FDM', 'Гнучкий еластичний пластик'],
            ['Nylon', 'FDM', 'Зносостійкий інженерний пластик'],
            ['Standard Resin', 'SLA', 'Універсальна фотополімерна смола'],
            ['Water-washable Resin', 'SLA', 'Смола, що змивається водою'],
            ['ABS-like Resin', 'SLA', 'Міцна смола з властивостями ABS'],
        ];

        $ids = [];

        foreach ($items as [$name, $technology, $description]) {
            $ids[$name] = Material::firstOrCreate(
                ['name' => $name],
                ['technology' => $technology, 'description' => $description]
            )->id;
        }

        $enclosed = ['K1C', 'K1 Max', 'P1S'];

        Printer::all()->each(function (Printer $printer) use ($ids, $enclosed) {
            if ($printer->technology->value === 'SLA') {
                $set = ['Standard Resin', 'Water-washable Resin'];
            } else {
                $set = in_array($printer->name, $enclosed, true)
                    ? ['PLA', 'PETG', 'ABS', 'ASA']
                    : ['PLA', 'PETG'];
            }

            $printer->materials()->syncWithoutDetaching(
                array_map(fn ($name) => $ids[$name], $set)
            );
        });
    }
}