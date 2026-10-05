<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MejaController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\ReservasiController;
use App\Http\Controllers\LaporanController;


/*
|--------------------------------------------------------------------------
| LOGIN
|--------------------------------------------------------------------------
*/

// Halaman Login
Route::get('/login', [AuthController::class, 'login'])
    ->name('login');

// Proses Login
Route::post('/login', [AuthController::class, 'prosesLogin'])
    ->name('proses.login');

// Logout
Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');


/*
|--------------------------------------------------------------------------
| AREA YANG HARUS LOGIN
|--------------------------------------------------------------------------
*/

Route::middleware('ceklogin')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | DASHBOARD
    |--------------------------------------------------------------------------
    */

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');


    /*
    |--------------------------------------------------------------------------
    | DATA MEJA
    |--------------------------------------------------------------------------
    | Hanya Kasir dan Manager
    |--------------------------------------------------------------------------
    */

    Route::middleware('role:kasir,manager')->group(function () {

        Route::resource('mejas', MejaController::class);

    });


    /*
    |--------------------------------------------------------------------------
    | TRANSAKSI
    |--------------------------------------------------------------------------
    | Kasir, Staff Dapur, dan Manager
    |--------------------------------------------------------------------------
    */

    Route::middleware('role:kasir,staff_dapur,manager')->group(function () {

        Route::resource('transaksis', TransaksiController::class);

    });


    /*
    |--------------------------------------------------------------------------
    | RESERVASI
    |--------------------------------------------------------------------------
    | Hanya Kasir dan Manager
    |--------------------------------------------------------------------------
    */

    Route::middleware('role:kasir,manager')->group(function () {

        Route::resource('reservasis', ReservasiController::class);

    });


    /*
    |--------------------------------------------------------------------------
    | LAPORAN
    |--------------------------------------------------------------------------
    | Khusus Manager
    |--------------------------------------------------------------------------
    */

    Route::middleware('role:manager')->group(function () {

        Route::get('/laporan', [LaporanController::class, 'index'])
            ->name('laporan.index');

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