<?php

use App\Http\Controllers\AjustesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PedidoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderStatusController;


use Illuminate\Support\Facades\Artisan;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::post('/orders/{id}/note', [OrderController::class, 'addNote']);

Route::middleware('auth')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/ajustes', [AjustesController::class, 'index'])->name('ajustes');
    Route::get('/crear', [PedidoController::class, 'create'])->name('pedidos.create');

    Route::prefix('api')->group(function () {
        Route::apiResource('companies', CompanyController::class);
    });



    Route::apiResource('companies', CompanyController::class);
    Route::apiResource('order-statuses', OrderStatusController::class);
    Route::apiResource('orders', OrderController::class);
});

Route::get('/migrar', function () {
    return Artisan::call('migrate', ['--force' => true]);
});

Route::get('/clear-cache', function () {
    Artisan::call('config:cache');
    return "Configuración actualizada con el nuevo .env";
});
