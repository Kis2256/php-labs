<?php

namespace App\Http\Controllers;

use App\Http\Requests\PrinterTranslationRequest;
use App\Models\Printer;

class PrinterTranslationController extends Controller
{
    public function index(Printer $printer)
    {
        $printer->load('translations');

        $locales = config('locales.supported');
        $translations = $printer->translations->keyBy('locale');

        return view('printers.translations.index', compact('printer', 'locales', 'translations'));
    }

    public function edit(Printer $printer, string $locale)
    {
        $this->checkLocale($locale);

        $translation = $printer->translations()->where('locale', $locale)->first();
        $language = config('locales.supported')[$locale];

        return view('printers.translations.edit', compact('printer', 'locale', 'language', 'translation'));
    }

    public function update(PrinterTranslationRequest $request, Printer $printer, string $locale)
    {
        $this->checkLocale($locale);

        $printer->translations()->updateOrCreate(
            ['locale' => $locale],
            $request->validated()
        );

        return redirect()
            ->route('printers.translations.index', $printer)
            ->with('success', 'Переклад збережено.');
    }

    public function destroy(Printer $printer, string $locale)
    {
        $this->checkLocale($locale);
        abort_if($locale === config('locales.default'), 403, 'Основну мову видаляти не можна.');

        $printer->translations()->where('locale', $locale)->delete();

        return redirect()
            ->route('printers.translations.index', $printer)
            ->with('success', 'Переклад видалено.');
    }

    private function checkLocale(string $locale): void
    {
        abort_unless(array_key_exists($locale, config('locales.supported')), 404);
    }
}