<?php

namespace App\Http\Controllers;

use App\Models\Meja;
use App\Models\Reservasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReservasiController extends Controller
{
    /**
     * Menampilkan daftar reservasi
     */
    public function index()
    {
        $reservasis = Reservasi::with('meja')
            ->latest('tanggal_reservasi')
            ->latest('jam_reservasi')
            ->get();

        return view('reservasis.index', compact('reservasis'));
    }

    /**
     * Form tambah reservasi
     */
    public function create()
    {
        $mejas = Meja::where('status', 'tersedia')
            ->orderBy('nomor_meja')
            ->get();

        return view('reservasis.create', compact('mejas'));
    }

    /**
     * Simpan reservasi
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'meja_id' => 'required|exists:mejas,id',
            'nama_pelanggan' => 'required|string|max:100',
            'no_hp' => 'required|string|max:20',
            'tanggal_reservasi' => 'required|date',
            'jam_reservasi' => 'required',
            'jumlah_orang' => 'required|integer|min:1',
            'status' => 'required|in:pending,dikonfirmasi,selesai,dibatalkan',
            'keterangan' => 'nullable|string',
        ], [
            'meja_id.required' => 'Meja wajib dipilih.',
            'meja_id.exists' => 'Meja tidak ditemukan.',
            'nama_pelanggan.required' => 'Nama pelanggan wajib diisi.',
            'no_hp.required' => 'Nomor HP wajib diisi.',
            'tanggal_reservasi.required' => 'Tanggal reservasi wajib diisi.',
            'jam_reservasi.required' => 'Jam reservasi wajib diisi.',
            'jumlah_orang.required' => 'Jumlah orang wajib diisi.',
            'jumlah_orang.min' => 'Jumlah orang minimal 1.',
        ]);

        $meja = Meja::findOrFail($validated['meja_id']);

        // Cek kapasitas meja
        if ($validated['jumlah_orang'] > $meja->kapasitas) {
            return back()
                ->withInput()
                ->with(
                    'error',
                    'Jumlah orang melebihi kapasitas meja. Kapasitas meja ini hanya ' .
                    $meja->kapasitas .
                    ' orang.'
                );
        }

        // Pastikan meja masih tersedia
        if ($meja->status !== 'tersedia') {
            return back()
                ->withInput()
                ->with('error', 'Meja tersebut sudah tidak tersedia.');
        }

        // Buat nomor reservasi otomatis
        $nomorReservasi = 'RSV-' .
            date('YmdHis') .
            '-' .
            random_int(100, 999);

        DB::transaction(function () use (
            $validated,
            $nomorReservasi,
            $meja
        ) {

            Reservasi::create([
                'nomor_reservasi' => $nomorReservasi,
                'meja_id' => $validated['meja_id'],
                'nama_pelanggan' => $validated['nama_pelanggan'],
                'no_hp' => $validated['no_hp'],
                'tanggal_reservasi' => $validated['tanggal_reservasi'],
                'jam_reservasi' => $validated['jam_reservasi'],
                'jumlah_orang' => $validated['jumlah_orang'],
                'status' => $validated['status'],
                'keterangan' => $validated['keterangan'] ?? null,
            ]);

            // Jika reservasi belum dibatalkan/selesai,
            // meja menjadi reservasi
            if (in_array($validated['status'], ['pending', 'dikonfirmasi'])) {
                $meja->update([
                    'status' => 'reservasi'
                ]);
            }
        });

        return redirect()
            ->route('reservasis.index')
            ->with('success', 'Reservasi berhasil ditambahkan.');
    }

    /**
     * Detail reservasi
     */
    public function show(Reservasi $reservasi)
    {
        $reservasi->load('meja');

        return view('reservasis.show', compact('reservasi'));
    }

    /**
     * Form edit reservasi
     */
    public function edit(Reservasi $reservasi)
    {
        $mejas = Meja::orderBy('nomor_meja')->get();

        return view('reservasis.edit', compact(
            'reservasi',
            'mejas'
        ));
    }

    /**
     * Update reservasi
     */
    public function update(
        Request $request,
        Reservasi $reservasi
    ) {
        $validated = $request->validate([
            'meja_id' => 'required|exists:mejas,id',
            'nama_pelanggan' => 'required|string|max:100',
            'no_hp' => 'required|string|max:20',
            'tanggal_reservasi' => 'required|date',
            'jam_reservasi' => 'required',
            'jumlah_orang' => 'required|integer|min:1',
            'status' => 'required|in:pending,dikonfirmasi,selesai,dibatalkan',
            'keterangan' => 'nullable|string',
        ]);

        $mejaBaru = Meja::findOrFail($validated['meja_id']);

        // Cek kapasitas
        if ($validated['jumlah_orang'] > $mejaBaru->kapasitas) {
            return back()
                ->withInput()
                ->with(
                    'error',
                    'Jumlah orang melebihi kapasitas meja. Kapasitas meja ini hanya ' .
                    $mejaBaru->kapasitas .
                    ' orang.'
                );
        }

        DB::transaction(function () use (
            $validated,
            $reservasi,
            $mejaBaru
        ) {

            // Simpan meja lama
            $mejaLama = $reservasi->meja;

            // Update reservasi
            $reservasi->update($validated);

            /*
            |--------------------------------------------------------------------------
            | UPDATE STATUS MEJA
            |--------------------------------------------------------------------------
            */

            // Jika meja diganti
            if ($mejaLama && $mejaLama->id != $mejaBaru->id) {

                // Meja lama dikembalikan tersedia
                if ($mejaLama->status === 'reservasi') {
                    $mejaLama->update([
                        'status' => 'tersedia'
                    ]);
                }
            }

            // Jika status aktif
            if (in_array($validated['status'], ['pending', 'dikonfirmasi'])) {

                $mejaBaru->update([
                    'status' => 'reservasi'
                ]);
            }

            // Jika selesai atau dibatalkan
            if (in_array($validated['status'], ['selesai', 'dibatalkan'])) {

                $mejaBaru->update([
                    'status' => 'tersedia'
                ]);
            }
        });

        return redirect()
            ->route('reservasis.index')
            ->with('success', 'Reservasi berhasil diperbarui.');
    }

    /**
     * Hapus reservasi
     */
    public function destroy(Reservasi $reservasi)
    {
        DB::transaction(function () use ($reservasi) {

            $meja = $reservasi->meja;

            $reservasi->delete();

            // Jika meja sedang reservasi,
            // kembalikan menjadi tersedia
            if ($meja && $meja->status === 'reservasi') {
                $meja->update([
                    'status' => 'tersedia'
                ]);
            }
        });

        return redirect()
            ->route('reservasis.index')
            ->with('success', 'Reservasi berhasil dihapus.');
    }
}