<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\TestDriveController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;

Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'showLogin')->name('login');
    Route::post('/login', 'login');
    Route::get('/register', 'showRegister')->name('register');
    Route::post('/register', 'register');
    Route::post('/logout', 'logout')->name('logout');
});

Route::group(['prefix' => '{locale?}', 'where' => ['locale' => 'en|ru']], function () {
    
    Route::get('/', [PageController::class, 'home'])->name('home');
    Route::get('/news', [PageController::class, 'news'])->name('news');
    Route::get('/news/{slug}', [PageController::class, 'newsShow'])->name('news.show');
    //Route::get('/models/{category}', [PageController::class, 'modelsCategory'])->name('models.category');
    Route::get('/about', [PageController::class, 'about'])->name('about');
    Route::get('/brand-history', [PageController::class, 'brandHistory'])->name('brand.history');
    Route::get('/contacts', [PageController::class, 'contacts'])->name('contacts');
    Route::get('/testdrive', [PageController::class, 'testdriveCreate'])->name('testdrive.create');
    Route::post('/testdrive', [TestDriveController::class, 'store'])->name('testdrive.store');
    Route::get('/sitemap', [PageController::class, 'sitemap'])->name('sitemap');
    Route::get('/cars/{car}', [PageController::class, 'carShow'])->name('car.show');
});

Route::get('/models/{category}/{locale?}', [PageController::class, 'modelsCategory'])
    ->where('locale', 'en|ru')
    ->name('models.category');

// Раздел администратора (защищен авторизацией)
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
});