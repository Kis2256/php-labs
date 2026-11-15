<?php

namespace Database\Seeders;

use App\Models\Filter;
use Illuminate\Database\Seeder;

class FilterSeeder extends Seeder
{
    public function run(): void
    {
        $names = [
            'FDM',
            'SLA',
            'PLA',
            'PETG',
            'Для початківців',
            'Налаштування',
            'Новини',
            'Огляд',
        ];

        foreach ($names as $name) {
            Filter::firstOrCreate([
                'filter_name' => $name,
            ]);
        }
    }
}