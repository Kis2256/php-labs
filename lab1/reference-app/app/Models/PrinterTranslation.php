<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PrinterTranslation extends Model
{
    protected $fillable = [
        'printer_id',
        'locale',
        'title',
        'description',
    ];

    public function printer(): BelongsTo
    {
        return $this->belongsTo(Printer::class);
    }
}