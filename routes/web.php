<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TentangController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\TestimoniController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\CheckoutController; // Tambahkan baris ini

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Route untuk halaman utama (Home)
Route::get('/', [HomeController::class, 'index']);

// Route untuk halaman Tentang
Route::get('/tentang', [TentangController::class, 'index'])->name('tentang');

// Route BARU untuk halaman Layanan
Route::get('/layanan', [LayananController::class, 'index'])->name('layanan');


// NEW route for the "Portfolio" page
Route::get('/portfolio', [PortfolioController::class, 'index'])->name('portfolio');

// Tambahkan route ini ke file web.php
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
Route::post('/checkout/process', [CheckoutController::class, 'process'])->name('checkout.process');
Route::get('/checkout/success', [CheckoutController::class, 'success'])->name('checkout.success');