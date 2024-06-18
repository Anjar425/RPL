<?php

use App\Http\Controllers\AdminCashierController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CashierController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\MedicineController;
use App\Models\AdminCashier;
use App\Models\Cashier;
use App\Models\History;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::middleware('guest')->group(function () {
    Route::get('/admin/login', [AdminCashierController::class, 'loginForm'])->name('admin.login');
    Route::get('/admin/register', [AdminCashierController::class, 'registerForm'])->name('registerForm');
    // Route::get('/admin/register', [AdminCashierController::class, 'register_Form'])->name('register_Form');

    Route::post('/admin/register', [AdminCashierController::class, 'register']);
    Route::post('/admin/login', [AdminCashierController::class, 'login']);

    Route::get('/cashier/login', [CashierController::class, 'loginForm'])->name('cashier.login');
    Route::post('/cashier/login', [CashierController::class, 'login']);
});
Route::middleware('auth:admin')->group(function () {
    Route::controller(MedicineController::class)->group(function () {
        Route::get('/admin/medicines', 'index');
        Route::post('/admin/insert-medicine', 'store');
        Route::post('/admin/{id}/update-medicine', 'update');
        Route::post('/admin/{id}/delete-medicine', 'destrphp artisan config:cache
php artisan view:cache
php artisan route:cacheoy');
        Route::get('/admin/{id}/detail-medicine', 'show');

        Route::get('/search', 'search');

        Route::get('/admin/expire-medicines', 'expireMedicine');
    });


    Route::controller(CashierController::class)->group(function () {
        Route::get('/admin/cashier', 'index');
        Route::post('/admin/insert-cashier', 'store');
        Route::post('/admin/{id}/update-cashier', 'update');
        Route::post('/admin/{id}/delete-cashier', 'destroy');
    });

    Route::get('/admin/report', [HistoryController::class, 'index'])->name('history.index');
});

Route::post('/logout', [AdminCashierController::class, 'logout']);


Route::middleware('auth:cashier')->group(function () {
    Route::get('/cashier/medicines', [MedicineController::class, 'index']);
    Route::get('/search', [MedicineController::class, 'search']);
    Route::get('/cashier/cart', [CartController::class, 'index']);
    Route::post('/cashier/addCart', [CartController::class, 'saveCart'])->name('addToCart');
    Route::post('/cart/update', [CartController::class, 'update']);
});
