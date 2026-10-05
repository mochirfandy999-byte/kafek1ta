<?php

namespace App\Http\Controllers;

use App\Models\Meja;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Menampilkan semua transaksi.
     */
    public function index()
    {
        $transaksis = Transaksi::with(['user', 'meja'])
            ->latest()
            ->get();

        return view('transaksis.index', compact('transaksis'));
    }

    /**
     * Form tambah transaksi.
     */
    public function create()
    {
        $mejas = Meja::where('status', 'tersedia')
            ->orderBy('nomor_meja')
            ->get();

        return view('transaksis.create', compact('mejas'));
    }

    /**
     * Menyimpan transaksi.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'meja_id' => 'required|exists:mejas,id',
            'nama_pelanggan' => 'required|string|max:100',
            'total_bayar' => 'required|numeric|min:0',
        ], [
            'meja_id.required' => 'Meja wajib dipilih.',
            'meja_id.exists' => 'Meja tidak ditemukan.',
            'nama_pelanggan.required' => 'Nama pelanggan wajib diisi.',
            'total_bayar.required' => 'Total bayar wajib diisi.',
            'total_bayar.numeric' => 'Total bayar harus berupa angka.',
        ]);

        $meja = Meja::findOrFail($validated['meja_id']);

        // Pastikan meja masih tersedia.
        if ($meja->status !== 'tersedia') {
            return back()
                ->withInput()
                ->with('error', 'Meja tersebut sudah tidak tersedia.');
        }

        // Membuat nomor transaksi otomatis.
        $nomorTransaksi = 'TRX-' . date('YmdHis') . '-' . random_int(100, 999);

        Transaksi::create([
            'nomor_transaksi' => $nomorTransaksi,
            'user_id' => auth()->id(),
            'meja_id' => $validated['meja_id'],
            'nama_pelanggan' => $validated['nama_pelanggan'],
            'tanggal_transaksi' => now(),
            'total_bayar' => $validated['total_bayar'],
            'status' => 'selesai',
        ]);

        // Setelah transaksi dibuat, meja menjadi terisi.
        $meja->update([
            'status' => 'terisi',
        ]);

        return redirect()
            ->route('transaksis.index')
            ->with('success', 'Transaksi berhasil ditambahkan.');
    }

    /**
     * Form edit transaksi.
     */
    public function edit(Transaksi $transaksi)
    {
        $mejas = Meja::orderBy('nomor_meja')->get();

        return view('transaksis.edit', compact(
            'transaksi',
            'mejas'
        ));
    }

    /**
     * Update transaksi.
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        $validated = $request->validate([
            'meja_id' => 'required|exists:mejas,id',
            'nama_pelanggan' => 'required|string|max:100',
            'total_bayar' => 'required|numeric|min:0',
            'status' => 'required|in:pending,selesai,batal',
        ]);

        $transaksi->update($validated);

        return redirect()
            ->route('transaksis.index')
            ->with('success', 'Transaksi berhasil diperbarui.');
    }

    /**
     * Hapus transaksi.
     */
    public function destroy(Transaksi $transaksi)
    {
        $transaksi->delete();

        return redirect()
            ->route('transaksis.index')
            ->with('success', 'Transaksi berhasil dihapus.');
    }
}