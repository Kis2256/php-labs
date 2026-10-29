<?php

namespace App\Http\Controllers;

use App\Enums\TechnologyEnum;
use App\Http\Requests\PrinterRequest;
use App\Models\Printer;
use Illuminate\Http\Request;

class PrinterController extends Controller
{
    public function index(Request $request)
    {
        $brand = $request->query('brand');

        $printers = Printer::query()
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
        $technologies = TechnologyEnum::cases();

        return view('printers.create', compact('technologies'));
    }

    public function store(PrinterRequest $request)
    {
        $printer = Printer::create($request->validated());

        return redirect()
            ->route('printers.show', $printer)
            ->with('success', 'Принтер додано.');
    }

    public function show(Printer $printer)
    {
        return view('printers.show', compact('printer'));
    }

    public function edit(Printer $printer)
    {
        $technologies = TechnologyEnum::cases();

        return view('printers.edit', compact('printer', 'technologies'));
    }

    public function update(PrinterRequest $request, Printer $printer)
    {
        $printer->update($request->validated());

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
}