<?php

namespace App\Models;

use App\Enums\TechnologyEnum;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Printer extends Model
{
    protected $fillable = [
        'name',
        'brand',
        'technology',
        'price',
        'quantity',
    ];

    protected $casts = [
        'technology' => TechnologyEnum::class,
        'price' => 'decimal:2',
        'quantity' => 'integer',
    ];

    public function translations(): HasMany
    {
        return $this->hasMany(PrinterTranslation::class);
    }

    /**
     * Переклад для обраної мови; якщо його немає – для основної.
     */
    public function translation(?string $locale = null): ?PrinterTranslation
    {
        $locale ??= app()->getLocale();

        return $this->translations->firstWhere('locale', $locale)
            ?? $this->translations->firstWhere('locale', config('locales.default'));
    }

    /**
     * true, якщо для поточної мови перекладу немає і показано основну мову.
     */
    public function usesFallback(): bool
    {
        return $this->translations->firstWhere('locale', app()->getLocale()) === null;
    }

    protected function title(): Attribute
    {
        return Attribute::get(fn () => $this->translation()?->title ?? $this->name);
    }

    protected function description(): Attribute
    {
        return Attribute::get(fn () => $this->translation()?->description);
    }
}