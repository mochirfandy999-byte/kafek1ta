<?php

namespace App\Http\Controllers;

use App\Models\Meja;
use App\Models\Pemesanan;
use Illuminate\Http\Request;

class PemesananController extends Controller
{
    /**
     * Menampilkan semua pemesanan.
     */
    public function index()
    {
        $pemesanans = Pemesanan::with(['user', 'meja'])
            ->latest()
            ->get();

        return view('pemesanans.index', compact('pemesanans'));
    }

    /**
     * Form tambah pemesanan.
     */
    public function create()
    {
        $mejas = Meja::where('status', 'tersedia')
            ->orderBy('nomor_meja')
            ->get();

        return view('pemesanans.create', compact('mejas'));
    }

    /**
     * Menyimpan pemesanan.
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

        // Membuat nomor pemesanan otomatis (prefix PMS atau ORD).
        $nomorPemesanan = 'PMS-' . date('YmdHis') . '-' . random_int(100, 999);

        Pemesanan::create([
            'nomor_transaksi' => $nomorPemesanan, // sesuaikan jika nama kolom di DB masih 'nomor_transaksi' atau sudah 'nomor_pemesanan'
            'user_id' => auth()->id(),
            'meja_id' => $validated['meja_id'],
            'nama_pelanggan' => $validated['nama_pelanggan'],
            'tanggal_transaksi' => now(), // sesuaikan jika kolom di DB diubah ke tanggal_pemesanan
            'total_bayar' => $validated['total_bayar'],
            'status' => 'selesai',
        ]);

        // Setelah pemesanan dibuat, meja menjadi terisi.
        $meja->update([
            'status' => 'terisi',
        ]);

        return redirect()
            ->route('pemesanans.index')
            ->with('success', 'Pemesanan berhasil ditambahkan.');
    }

    /**
     * Form edit pemesanan.
     */
    public function edit(Pemesanan $pemesanan)
    {
        $mejas = Meja::orderBy('nomor_meja')->get();

        return view('pemesanans.edit', compact(
            'pemesanan',
            'mejas'
        ));
    }

    /**
     * Update pemesanan.
     */
    public function update(Request $request, Pemesanan $pemesanan)
    {
        $validated = $request->validate([
            'meja_id' => 'required|exists:mejas,id',
            'nama_pelanggan' => 'required|string|max:100',
            'total_bayar' => 'required|numeric|min:0',
            'status' => 'required|in:pending,selesai,batal',
        ]);

        $pemesanan->update($validated);

        return redirect()
            ->route('pemesanans.index')
            ->with('success', 'Pemesanan berhasil diperbarui.');
    }

    /**
     * Hapus pemesanan.
     */
    public function destroy(Pemesanan $pemesanan)
    {
        $pemesanan->delete();

        return redirect()
            ->route('pemesanans.index')
            ->with('success', 'Pemesanan berhasil dihapus.');
    }
}