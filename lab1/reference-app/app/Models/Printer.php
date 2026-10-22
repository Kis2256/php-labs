<?php

namespace App\Models;

use App\Enums\TechnologyEnum;
use Illuminate\Database\Eloquent\Model;

class Printer extends Model
{
    protected $fillable = [
        'name',
        'brand',
        'technology',
        'price',
        'quantity',
        'description',
    ];

    protected $casts = [
        'technology' => TechnologyEnum::class,
        'price' => 'decimal:2',
        'quantity' => 'integer',
    ];
}