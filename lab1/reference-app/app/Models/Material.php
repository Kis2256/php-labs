<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Material extends Model
{
    protected $fillable = [
        'name',
        'technology',
        'description',
    ];

    public function printers(): BelongsToMany
    {
        return $this->belongsToMany(
            Printer::class,
            'printer_material',
            'material_id',
            'printer_id'
        );
    }
}