<?php

namespace App\Http\Controllers;

use App\Models\Printer;
use App\Models\Tracker;
use Illuminate\Http\Request;

class StatsController extends Controller
{
    private const TYPES = [
        'page' => 'Сторінка',
        'ip' => 'IP-адреса',
        'method' => 'HTTP-метод',
        'device' => 'Тип пристрою',
        'route_name' => 'Маршрут',
    ];

    public function pages(Request $request)
    {
        $type = $request->query('type', 'page');

        if (!array_key_exists($type, self::TYPES)) {
            abort(400, 'Невідомий тип групування.');
        }

        $rows = Tracker::query()
            ->selectRaw("{$type}, count(*) as hits, count(distinct ip) as visitors, max(visited_at) as last_visit")
            ->groupBy($type)
            ->orderByDesc('hits')
            ->get();

        $types = self::TYPES;

        return view('stats.pages', compact('rows', 'type', 'types'));
    }

    public function detail(Request $request)
    {
        $type = $request->query('type', 'page');
        $item = $request->query('item');

        if (!array_key_exists($type, self::TYPES)) {
            abort(400, 'Невідомий тип фільтрації.');
        }

        $rows = Tracker::query()
            ->when($item, fn ($query, $value) => $query->where($type, $value))
            ->orderByDesc('visited_at')
            ->paginate(15)
            ->withQueryString();

        $types = self::TYPES;

        return view('stats.detail', compact('rows', 'type', 'item', 'types'));
    }

    public function printers()
    {
        $views = Tracker::query()
            ->selectRaw("JSON_UNQUOTE(JSON_EXTRACT(meta, '$.printer_id')) as printer_id, count(*) as hits, count(distinct ip) as visitors, max(visited_at) as last_visit")
            ->where('route_name', 'printers.show')
            ->whereNotNull('meta')
            ->groupBy('printer_id')
            ->orderByDesc('hits')
            ->limit(10)
            ->get();

        $printers = Printer::query()
            ->whereIn('id', $views->pluck('printer_id'))
            ->get()
            ->keyBy('id');

        $brands = Tracker::query()
            ->selectRaw("JSON_UNQUOTE(JSON_EXTRACT(meta, '$.brand')) as brand, count(*) as hits")
            ->where('route_name', 'printers.index')
            ->whereRaw("JSON_EXTRACT(meta, '$.brand') IS NOT NULL")
            ->groupBy('brand')
            ->orderByDesc('hits')
            ->get();

        return view('stats.printers', compact('views', 'printers', 'brands'));
    }
}