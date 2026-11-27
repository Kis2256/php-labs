<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FilterController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\PrinterController;
use App\Http\Controllers\PrinterTranslationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\StatsController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/users', [UserController::class, 'index'])->name('users.index');

    Route::resource('printers', PrinterController::class)->except(['index', 'show']);
    Route::get('/printers/{printer}/translations', [PrinterTranslationController::class, 'index'])->name('printers.translations.index');
    Route::get('/printers/{printer}/translations/{locale}/edit', [PrinterTranslationController::class, 'edit'])->name('printers.translations.edit');
    Route::put('/printers/{printer}/translations/{locale}', [PrinterTranslationController::class, 'update'])->name('printers.translations.update');
    Route::delete('/printers/{printer}/translations/{locale}', [PrinterTranslationController::class, 'destroy'])->name('printers.translations.destroy');

    Route::resource('country', CountryController::class)->except(['index', 'show']);

    Route::get('/blog/admin', [BlogController::class, 'admin'])->name('blog.admin');
    Route::get('/blog/{blog}/tags', [BlogController::class, 'tags'])->name('blog.tags');
    Route::post('/blog/{blog}/tags', [BlogController::class, 'tagsStore'])->name('blog.tags.store');
    Route::resource('blog', BlogController::class)->except(['index', 'show']);

    Route::resource('filters', FilterController::class)->except(['show']);
});

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

Route::resource('country', CountryController::class)->only(['index', 'show']);
Route::resource('printers', PrinterController::class)->only(['index', 'show']);
Route::get('/materials', [MaterialController::class, 'index'])->name('materials.index');

Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{blog}', [BlogController::class, 'show'])->name('blog.show');

Route::get('/stats', [StatsController::class, 'pages'])->name('stats.pages');
Route::get('/stats/detail', [StatsController::class, 'detail'])->name('stats.detail');
Route::get('/stats/printers', [StatsController::class, 'printers'])->name('stats.printers');

require __DIR__ . '/auth.php';