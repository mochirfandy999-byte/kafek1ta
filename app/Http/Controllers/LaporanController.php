<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
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
        // LAPORAN TRANSAKSI
        // =========================
        $transaksiQuery = Transaksi::with(['user', 'meja'])
            ->orderBy('tanggal_transaksi', 'desc');

        if ($tanggalMulai) {
            $transaksiQuery->whereDate(
                'tanggal_transaksi',
                '>=',
                $tanggalMulai
            );
        }

        if ($tanggalSelesai) {
            $transaksiQuery->whereDate(
                'tanggal_transaksi',
                '<=',
                $tanggalSelesai
            );
        }

        $transaksis = $transaksiQuery->get();

        // Total transaksi
        $jumlahTransaksi = $transaksis->count();

        // Total pendapatan
        $totalPendapatan = $transaksis
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
            'transaksis',
            'reservasis',
            'jumlahTransaksi',
            'totalPendapatan',
            'jumlahReservasi',
            'reservasiSelesai',
            'tanggalMulai',
            'tanggalSelesai'
        ));
    }
}