<?php

namespace App\Enums;

enum TopicEnum: string
{
    case PrintModel = 'print_model';
    case ChoosePrinter = 'choose_printer';
    case Materials = 'materials';
    case Other = 'other';

    public function label(): string
    {
        return match ($this) {
            self::PrintModel => 'Друк деталі за моделлю',
            self::ChoosePrinter => 'Підбір 3D-принтера',
            self::Materials => 'Консультація щодо матеріалів',
            self::Other => 'Інше питання',
        };
    }
}