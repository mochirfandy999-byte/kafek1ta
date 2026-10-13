<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use App\Models\Reservasi;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        // Ambil tanggal filter
        $tanggalMulai = $request->tanggal_mulai;
        $tanggalSelesai = $request->tanggal_selesai;

        // =========================
        // LAPORAN PEMESANAN
        // =========================
        $pemesananQuery = Pemesanan::with(['user', 'meja'])
            ->orderBy('created_at', 'desc');

        if ($tanggalMulai) {
            $pemesananQuery->whereDate(
                'created_at',
                '>=',
                $tanggalMulai
            );
        }

        if ($tanggalSelesai) {
            $pemesananQuery->whereDate(
                'created_at',
                '<=',
                $tanggalSelesai
            );
        }

        $pemesanans = $pemesananQuery->get();

        // Total pemesanan
        $jumlahPemesanan = $pemesanans->count();

        // Total pendapatan
        $totalPendapatan = $pemesanans
            ->where('status', 'selesai')
            ->sum('total_bayar');


        // =========================
        // LAPORAN RESERVASI
        // =========================
        $reservasiQuery = Reservasi::with('meja')
            ->orderBy('tanggal_reservasi', 'desc')
            ->orderBy('jam_reservasi', 'desc');

        if ($tanggalMulai) {
            $reservasiQuery->whereDate(
                'tanggal_reservasi',
                '>=',
                $tanggalMulai
            );
        }

        if ($tanggalSelesai) {
            $reservasiQuery->whereDate(
                'tanggal_reservasi',
                '<=',
                $tanggalSelesai
            );
        }

        $reservasis = $reservasiQuery->get();

        // Jumlah reservasi
        $jumlahReservasi = $reservasis->count();

        // Reservasi selesai
        $reservasiSelesai = $reservasis
            ->where('status', 'selesai')
            ->count();

        return view('laporan.index', compact(
            'pemesanans',
            'reservasis',
            'jumlahPemesanan',
            'totalPendapatan',
            'jumlahReservasi',
            'reservasiSelesai',
            'tanggalMulai',
            'tanggalSelesai'
        ));
    }
}