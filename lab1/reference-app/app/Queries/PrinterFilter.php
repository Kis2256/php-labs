<?php

namespace App\Queries;

use App\Models\Printer;
use Illuminate\Database\Eloquent\Builder;

class PrinterFilter
{
    private const SORTABLE = [
        'name' => 'printers.name',
        'price' => 'printers.price',
        'quantity' => 'printers.quantity',
        'materials' => 'materials_count',
    ];

    public function apply(array $input): Builder
    {
        $query = Printer::query()
            ->with('materials')
            ->withCount('materials');

        $query->when($input['q'] ?? null,
            fn (Builder $q, $v) => $q->where(function (Builder $w) use ($v) {
                $w->where('printers.name', 'like', "%{$v}%")
                    ->orWhere('printers.brand', 'like', "%{$v}%")
                    ->orWhereHas('materials',
                        fn (Builder $m) => $m->where('materials.name', 'like', "%{$v}%"));
            }));

        $query->when($input['brand'] ?? null,
            fn (Builder $q, $v) => $q->where('printers.brand', $v));

        $query->when($input['technology'] ?? null,
            fn (Builder $q, $v) => $q->where('printers.technology', $v));

        $query->when($input['material_id'] ?? null,
            fn (Builder $q, $v) => $q->whereHas('materials',
                fn (Builder $m) => $m->whereKey($v)));

        return $this->sort($query, $input['sort'] ?? null);
    }

    private function sort(Builder $query, ?string $sort): Builder
    {
        $desc = str_starts_with($sort ?? '', '-');
        $field = $desc ? substr($sort, 1) : $sort;

        if (!isset(self::SORTABLE[$field])) {
            return $query->orderBy('printers.name')->orderBy('printers.id');
        }

        return $query
            ->orderBy(self::SORTABLE[$field], $desc ? 'desc' : 'asc')
            ->orderBy('printers.id');
    }
}