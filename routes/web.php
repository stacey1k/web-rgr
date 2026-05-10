<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\TestDriveController;
use App\Http\Controllers\Admin\AdminController;

// Пользовательская часть
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/news', [PageController::class, 'news'])->name('news');
Route::get('/models/{category}', [PageController::class, 'modelsCategory'])->name('models.category');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/brand-history', [PageController::class, 'brandHistory'])->name('brand.history');
Route::get('/contacts', [PageController::class, 'contacts'])->name('contacts');
Route::get('/testdrive', [PageController::class, 'testdriveCreate'])->name('testdrive.create');
Route::post('/testdrive', [TestDriveController::class, 'store'])->name('testdrive.store');
Route::get('/sitemap', [PageController::class, 'sitemap'])->name('sitemap');

// Раздел администратора (защищён авторизацией)
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    // ... позже добавим
});