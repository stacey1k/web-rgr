<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\TestDriveController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => '{locale?}', 'where' => ['locale' => 'en|ru']], function () {
    
    Route::controller(AuthController::class)->group(function () {
        Route::get('/login', 'showLogin')->name('login');
        Route::post('/login', 'login');
        Route::get('/register', 'showRegister')->name('register');
        Route::post('/register', 'register');
        Route::post('/logout', 'logout')->name('logout');
    });
    
    Route::get('/', [PageController::class, 'home'])->name('home');
    Route::get('/news', [PageController::class, 'news'])->name('news');
    Route::get('/news/{slug}', [PageController::class, 'newsShow'])->name('news.show');
    Route::get('/testdrive', [TestDriveController::class, 'create'])->name('testdrive.create');
    Route::post('/testdrive', [TestDriveController::class, 'store'])->name('testdrive.store');
    Route::get('/cars/{car}/buy', [PurchaseController::class, 'create'])->name('purchase.create');
    Route::post('/cars/{car}/buy', [PurchaseController::class, 'store'])->name('purchase.store');
    Route::get('/cars/{car}', [PageController::class, 'carShow'])->name('car.show');
    Route::get('/{slug}', [PageController::class, 'showPage'])
        ->where('slug', 'about|brand-history|contacts')
        ->name('page.show');
});

Route::get('/models/{category}/{locale?}', [PageController::class, 'modelsCategory'])
    ->where('locale', 'en|ru')
    ->name('models.category');

// Раздел администратора (защищен авторизацией)
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('pages', App\Http\Controllers\Admin\PageController::class);
    Route::post('/upload-image', [App\Http\Controllers\Admin\ImageUploadController::class, 'upload'])->name('upload.image');
    Route::resource('cars', App\Http\Controllers\Admin\CarController::class)->except(['show']);
    Route::resource('news', App\Http\Controllers\Admin\NewsController::class)->except(['show']);
    Route::resource('test-drive-requests', App\Http\Controllers\Admin\TestDriveRequestController::class)->except(['create', 'store', 'destroy']);
    Route::resource('purchase-requests', App\Http\Controllers\Admin\PurchaseRequestController::class)->except(['create', 'store', 'destroy']);
    Route::get('users', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('users.index');
    Route::patch('users/{user}', [App\Http\Controllers\Admin\UserController::class, 'update'])->name('users.update');
    });