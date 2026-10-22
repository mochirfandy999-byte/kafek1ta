<?php

namespace App\Http\Controllers;

use App\Models\Meja;
use App\Models\Pemesanan;
use App\Models\DetailPemesanan;
use App\Models\Pembayaran;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    public function detailPemesanans()
{
    return $this->hasMany(DetailPemesanan::class, 'pemesanan_id');
}

    /**
     * Form tambah pemesanan.
     */
    public function create()
{
    // Hanya tampilkan meja yang statusnya 'tersedia'
    $mejas = Meja::where('status', 'tersedia')->get();
    $menus = Menu::all();

    return view('pemesanans.create', compact('mejas', 'menus'));
}

public function store(Request $request)
{
    $validated = $request->validate([
        'meja_id'           => 'required|exists:mejas,id',
        'nama_pelanggan'    => 'required|string|max:100',
        'catatan'           => 'nullable|string|max:255',
        'menu_id'           => 'required|array|min:1',
        'menu_id.*'         => 'required|exists:menus,id',
        'jumlah'            => 'required|array|min:1',
        'jumlah.*'          => 'required|integer|min:1',
        'total_bayar'       => 'required|numeric|min:0',
        'metode_pembayaran' => 'required|in:tunai,qris',
        'uang_dibayar'      => 'nullable|numeric|min:0',
    ], [
        'meja_id.required'           => 'Meja wajib dipilih.',
        'nama_pelanggan.required'    => 'Nama pelanggan wajib diisi.',
        'menu_id.required'           => 'Pilih minimal satu menu.',
        'jumlah.*.min'               => 'Jumlah item minimal 1.',
        'total_bayar.required'       => 'Total bayar tidak valid.',
        'metode_pembayaran.required' => 'Metode pembayaran wajib dipilih.',
    ]);

    $meja = Meja::findOrFail($validated['meja_id']);

    if (strtolower($meja->status) !== 'tersedia') {
        return back()
            ->withInput()
            ->with('error', 'Meja tersebut sudah tidak tersedia.');
    }

    $nomorPemesanan = 'PMS-' . date('YmdHis') . '-' . random_int(100, 999);

    // Hitung nominal uang dibayar dan kembalian
    $metode = $validated['metode_pembayaran'];
    $totalBayar = (float) $validated['total_bayar'];

    if ($metode === 'tunai') {
        $uangDibayar = (float) ($request->uang_dibayar ?? 0);
        $kembalian = max(0, $uangDibayar - $totalBayar);
    } else {
        $uangDibayar = $totalBayar;
        $kembalian = 0;
    }

    $pemesanan = DB::transaction(function () use ($validated, $meja, $nomorPemesanan, $request, $totalBayar, $uangDibayar, $kembalian) {
        
        // 1. Simpan Header Pemesanan (HANYA DATA PESANAN)
        $pesanan = Pemesanan::create([
            'nomor_transaksi'   => $nomorPemesanan,
            'user_id'           => auth()->id(),
            'meja_id'           => $validated['meja_id'],
            'nama_pelanggan'    => $validated['nama_pelanggan'],
            'catatan'           => $request->catatan,
            'tanggal_transaksi' => now(),
            'total_bayar'       => $totalBayar,
            'status'            => 'selesai',
        ]);

        // 2. Simpan ke Tabel PEMBAYARANS
        Pembayaran::create([
            'pemesanan_id'      => $pesanan->id,
            'metode_pembayaran' => $validated['metode_pembayaran'],
            'total_bayar'       => $totalBayar,
            'uang_dibayar'      => $uangDibayar,
            'kembalian'         => $kembalian,
            // 'status'         => 'lunas', // aktifkan jika tabel pembayarans punya kolom status
        ]);

        // 3. Simpan Rincian Menu Pesanan
        foreach ($validated['menu_id'] as $index => $menuId) {
            $menu = Menu::find($menuId);
            $qty  = $validated['jumlah'][$index];

            DetailPemesanan::create([
                'pemesanan_id' => $pesanan->id,
                'menu_id'      => $menuId,
                'jumlah'       => $qty,
                'harga_satuan' => $menu->harga,
                'subtotal'     => $menu->harga * $qty,
            ]);
        }

        // 4. Ubah status meja menjadi terisi
        $meja->update(['status' => 'terisi']);

        return $pesanan;
    });

    return redirect()
        ->route('pemesanans.nota', $pemesanan->id)
        ->with('success', 'Pemesanan berhasil disimpan! Silakan cetak nota.');
}

// Method untuk menampilkan Nota Pemesanan
public function nota($id)
{
    $pemesanan = Pemesanan::with(['meja', 'user', 'detailPemesanans.menu'])->findOrFail($id);
    return view('pemesanans.nota', compact('pemesanan'));
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

       return redirect()->route('pemesanans.index')->with('success', 'Pemesanan berhasil disimpan!');
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