<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MejaController;
use App\Http\Controllers\ReservasiController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PemesananController;

/*
|--------------------------------------------------------------------------
| LOGIN & LOGOUT
|--------------------------------------------------------------------------
*/

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'prosesLogin'])->name('proses.login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| AREA YANG HARUS LOGIN
|--------------------------------------------------------------------------
*/

Route::middleware('ceklogin')->group(function () {

    /* DASHBOARD */
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    /* DATA MEJA (Kasir & Manager) */
    Route::middleware('role:kasir,manager')->group(function () {
        Route::resource('mejas', MejaController::class);
    });

    /* DATA MENU */
    Route::middleware(['auth'])->group(function () {
        Route::resource('menus', MenuController::class);
    });

    /* TRANSAKSI & PEMESANAN (Kasir, Staff Dapur, Manager) */
    Route::middleware('role:kasir,staff_dapur,manager')->group(function () {
        Route::get('/pemesanans/{id}/nota', [PemesananController::class, 'nota'])->name('pemesanans.nota');
        Route::resource('pemesanans', PemesananController::class);
    });

    /* RESERVASI (Kasir & Manager) */
    Route::middleware('role:kasir,manager')->group(function () {
        Route::resource('reservasis', ReservasiController::class);
    });

    /* LAPORAN (Khusus Manager) */
    Route::middleware('role:manager')->group(function () {
        Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
    });

});

/*
|--------------------------------------------------------------------------
| ROOT
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return redirect()->route('login');
});