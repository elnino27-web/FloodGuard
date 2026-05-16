<?php

use App\Http\Controllers\BanjirController;
use Illuminate\Support\Facades\Route;

// 1. Halaman Utama (Home)
Route::get('/', function () {
    return view('home');
})->name('home');

// 2. Halaman Form Input Data
Route::get('/analisis', [BanjirController::class, 'index'])->name('banjir.index');

// 3. Proses Perhitungan dan Menampilkan Hasil
Route::post('/analisis/proses', [BanjirController::class, 'hitung'])->name('banjir.hitung');
