<?php

namespace App\Enums;

enum CategoryEnum: string
{
    case Printers = 'printers';
    case Filament = 'filament';
    case Resin = 'resin';
    case Parts = 'parts';

    public function title(): string
    {
        return match ($this) {
            self::Printers => '3D-принтери',
            self::Filament => 'Філамент',
            self::Resin => 'Смоли',
            self::Parts => 'Запчастини',
        };
    }

    public function icon(): string
    {
        return match ($this) {
            self::Printers => '🖨️',
            self::Filament => '🧵',
            self::Resin => '🧪',
            self::Parts => '⚙️',
        };
    }

    public function description(): string
    {
        return match ($this) {
            self::Printers => 'FDM та SLA-принтери для дому, навчання й виробництва.',
            self::Filament => 'PLA, PETG, ABS, TPU та інженерні пластики різних кольорів.',
            self::Resin => 'Фотополімерні смоли для деталізованого друку.',
            self::Parts => 'Сопла, столи, хотенди, ремені та інші комплектуючі.',
        };
    }

    public function price(): string
    {
        return match ($this) {
            self::Printers => 'від 7 999 грн',
            self::Filament => 'від 450 грн',
            self::Resin => 'від 890 грн',
            self::Parts => 'від 99 грн',
        };
    }
}