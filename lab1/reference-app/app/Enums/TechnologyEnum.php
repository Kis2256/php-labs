<?php

namespace App\Enums;

enum TechnologyEnum: string
{
    case FDM = 'FDM';
    case SLA = 'SLA';

    public function label(): string
    {
        return match ($this) {
            self::FDM => 'FDM (друк пластиком)',
            self::SLA => 'SLA (друк смолою)',
        };
    }
}