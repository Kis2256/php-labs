<?php

use App\Http\Controllers\SiteController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\PrinterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StatsController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\PrinterTranslationController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/say/{message?}', [SiteController::class, 'say'])->name('site.say');

Route::get('/entry', [SiteController::class, 'entry'])->name('entry.form');
Route::post('/entry', [SiteController::class, 'entryStore'])->name('entry.store');

Route::view('/about', 'site.about')->name('site.about');
Route::view('/contact', 'site.contact')->name('site.contact');

Route::get('/catalog/{category}', [SiteController::class, 'catalog'])->name('catalog');

Route::get('/3d-print', [SiteController::class, 'printOrder'])->name('print.form');
Route::post('/3d-print', [SiteController::class, 'printOrderStore'])->name('print.store');
Route::resource('country', CountryController::class);
Route::resource('printers', PrinterController::class);

Route::get('/stats', [StatsController::class, 'pages'])->name('stats.pages');
Route::get('/stats/detail', [StatsController::class, 'detail'])->name('stats.detail');
Route::get('/stats/printers', [StatsController::class, 'printers'])->name('stats.printers');


Route::get('/blog/admin', [BlogController::class, 'admin'])->name('blog.admin');
Route::resource('blog', BlogController::class);

Route::get('/printers/{printer}/translations', [PrinterTranslationController::class, 'index'])->name('printers.translations.index');
Route::get('/printers/{printer}/translations/{locale}/edit', [PrinterTranslationController::class, 'edit'])->name('printers.translations.edit');
Route::put('/printers/{printer}/translations/{locale}', [PrinterTranslationController::class, 'update'])->name('printers.translations.update');
Route::delete('/printers/{printer}/translations/{locale}', [PrinterTranslationController::class, 'destroy'])->name('printers.translations.destroy');