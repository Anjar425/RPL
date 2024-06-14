<?php

use App\Http\Controllers\AdminCashierController;
use App\Http\Controllers\CashierController;
use App\Http\Controllers\MedicineController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin/login', [AdminCashierController::class, 'loginForm']);
Route::get('/admin/register', [AdminCashierController::class, 'registerForm']);

Route::post('/admin/register', [AdminCashierController::class, 'register']);
Route::post('/admin/login', [AdminCashierController::class, 'login']);

Route::get('/admin/cashier', [CashierController::class, 'index']);
Route::get('/admin/medicines', [MedicineController::class, 'index']);
Route::post('/admin/insert-medicine', [MedicineController::class, 'store']);
Route::post('/admin/{id}/update-medicine', [MedicineController::class, 'update']);
Route::post('/admin/{id}/delete-medicine', [MedicineController::class, 'destroy']);



