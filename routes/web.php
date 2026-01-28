<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController; // <--- Importante: Importar el controlador
use App\Http\Controllers\ProductController; 
use App\Http\Controllers\AuthController;

Route::get('/', HomeController::class)->name('home');
Route::get('/tienda', [ProductController::class, 'index'])->name('tienda.index');
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');