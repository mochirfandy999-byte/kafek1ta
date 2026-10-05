<?php

namespace App\Http\Controllers;

use App\Models\Meja;

class DashboardController extends Controller
{
    public function index()
    {
        // Menghitung jumlah seluruh meja
        $jumlahMeja = Meja::count();

        // Menghitung meja berdasarkan status
        $mejaTersedia = Meja::where('status', 'tersedia')->count();

        $mejaTerisi = Meja::where('status', 'terisi')->count();

        $jumlahReservasi = Meja::where('status', 'reservasi')->count();

        return view('dashboard.index', compact(
            'jumlahMeja',
            'mejaTersedia',
            'mejaTerisi',
            'jumlahReservasi'
        ));
    }
}