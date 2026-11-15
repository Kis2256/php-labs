<?php

namespace App\Http\Controllers;

use App\Enums\TechnologyEnum;
use App\Http\Requests\PrinterRequest;
use App\Models\Material;
use App\Models\Printer;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class PrinterController extends Controller
{
    public function index(Request $request)
    {
        $brand = $request->query('brand');

        $printers = Printer::query()
            ->with('translations')
            ->withCount('materials')
            ->when($brand, fn ($query) => $query->where('brand', $brand))
            ->orderBy('name')
            ->paginate(5)
            ->withQueryString();

        $brands = Printer::query()
            ->distinct()
            ->orderBy('brand')
            ->pluck('brand');

        return view('printers.index', compact('printers', 'brands', 'brand'));
    }

    public function create()
    {
        return view('printers.create', [
            'technologies' => TechnologyEnum::cases(),
            'materials' => $this->materialsGrouped(),
            'selected' => [],
        ]);
    }

    public function store(PrinterRequest $request)
    {
        $data = $request->validated();

        $printer = Printer::create(Arr::except($data, ['materials']));

        $printer->materials()->sync($data['materials'] ?? []);

        return redirect()
            ->route('printers.show', $printer)
            ->with('success', 'Принтер додано. Тепер можна додати переклади.');
    }

    public function show(Printer $printer)
    {
        $printer->load(['translations', 'materials']);

        return view('printers.show', compact('printer'));
    }

    public function edit(Printer $printer)
    {
        $printer->load('materials');

        return view('printers.edit', [
            'printer' => $printer,
            'technologies' => TechnologyEnum::cases(),
            'materials' => $this->materialsGrouped(),
            'selected' => $printer->materials->pluck('id')->all(),
        ]);
    }

    public function update(PrinterRequest $request, Printer $printer)
    {
        $data = $request->validated();

        $printer->update(Arr::except($data, ['materials']));

        $printer->materials()->sync($data['materials'] ?? []);

        return redirect()
            ->route('printers.show', $printer)
            ->with('success', 'Зміни збережено.');
    }

    public function destroy(Printer $printer)
    {
        $printer->delete();

        return redirect()
            ->route('printers.index')
            ->with('success', 'Принтер видалено.');
    }

    private function materialsGrouped()
    {
        return Material::orderBy('technology')
            ->orderBy('name')
            ->get()
            ->groupBy('technology');
    }
}