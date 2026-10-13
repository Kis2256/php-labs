<?php

use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/say/{message?}', [SiteController::class, 'say'])->name('site.say');

Route::get('/entry', [SiteController::class, 'entry'])->name('entry.form');
Route::post('/entry', [SiteController::class, 'entryStore'])->name('entry.store');

Route::view('/about', 'site.about')->name('site.about');
Route::view('/contact', 'site.contact')->name('site.contact');

Route::get('/catalog/{category}', [SiteController::class, 'catalog'])
    ->whereIn('category', ['printers', 'filament', 'resin', 'parts'])
    ->name('catalog');
Route::get('/3d-print', [SiteController::class, 'printService'])->name('print.form');
Route::post('/3d-print', [SiteController::class, 'printServiceStore'])->name('print.store');