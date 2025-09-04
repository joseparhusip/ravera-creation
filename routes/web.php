<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TentangController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\TestimoniController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\CheckoutController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Route untuk halaman utama (Home)
Route::get('/', [HomeController::class, 'index']);

// Route untuk halaman Tentang
Route::get('/tentang', [TentangController::class, 'index'])->name('tentang');

// Route untuk halaman Layanan
Route::get('/layanan', [LayananController::class, 'index'])->name('layanan');

// Route untuk halaman "Portfolio"
Route::get('/portfolio', [PortfolioController::class, 'index'])->name('portfolio');

// --- PERBAIKAN ROUTE CHECKOUT ---
// PERUBAIKAN 1: Menggunakan route parameter {package} agar lebih rapi.
Route::get('/checkout/{package}', [CheckoutController::class, 'show'])->name('checkout');
Route::post('/checkout/process', [CheckoutController::class, 'process'])->name('checkout.process');
Route::get('/checkout/success', [CheckoutController::class, 'success'])->name('checkout.success');

// PERUBAIKAN 2: Kurung kurawal ekstra di akhir file sudah dihapus.