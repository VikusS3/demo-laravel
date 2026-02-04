<?php

use App\Http\Controllers\AjustesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/ajustes', [AjustesController::class, 'index'])->name('ajustes');
Route::get('/crear', [PedidoController::class, 'create'])->name('pedidos.create');
