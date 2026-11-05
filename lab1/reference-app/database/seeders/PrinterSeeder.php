<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PrinterSeeder extends Seeder
{
    public function run(): void
    {
        $printers = [
            ['Ender-3 V3 SE', 'Creality', 'FDM', 8999, 12],
            ['Ender-3 V3 KE', 'Creality', 'FDM', 11499, 7],
            ['K1C', 'Creality', 'FDM', 23999, 4],
            ['K1 Max', 'Creality', 'FDM', 34999, 2],
            ['Halot-Mage 8K', 'Creality', 'SLA', 15999, 5],
            ['CR-10 SE', 'Creality', 'FDM', 17999, 3],
            ['MK4S', 'Prusa', 'FDM', 39999, 3],
            ['MINI+', 'Prusa', 'FDM', 19999, 6],
            ['A1 mini', 'Bambu Lab', 'FDM', 10999, 10],
            ['P1S', 'Bambu Lab', 'FDM', 31999, 4],
            ['Kobra 3', 'Anycubic', 'FDM', 13999, 8],
            ['Photon Mono M7', 'Anycubic', 'SLA', 14499, 6],
            ['Saturn 4 Ultra', 'Elegoo', 'SLA', 21999, 3],
            ['Neptune 4 Pro', 'Elegoo', 'FDM', 12499, 9],
        ];

        foreach ($printers as [$name, $brand, $technology, $price, $quantity]) {
            DB::table('printers')->insert([
                'name' => $name,
                'brand' => $brand,
                'technology' => $technology,
                'price' => $price,
                'quantity' => $quantity,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}