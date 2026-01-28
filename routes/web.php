<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController; // <--- Importante: Importar el controlador
use App\Http\Controllers\ProductController; 
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;

Route::get('/', HomeController::class)->name('home');
Route::get('/tienda', [ProductController::class, 'index'])->name('tienda.index');
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/carrito', [CartController::class, 'index'])->name('carrito.index');
Route::post('/carrito/add/{id}', [CartController::class, 'add'])->name('carrito.add');
Route::get('/carrito/remove/{id}', [CartController::class, 'remove'])->name('carrito.remove');
Route::get('/carrito/clear', [CartController::class, 'clear'])->name('carrito.clear');