<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    protected $table = 'pemesanans';

    protected $fillable = [
        'nomor_transaksi',
        'user_id',
        'meja_id',
        'nama_pelanggan',
        'catatan',
        'tanggal_transaksi',
        'total_bayar',
        'status',
    ];

    protected $casts = [
        'tanggal_transaksi' => 'datetime',
        'total_bayar' => 'decimal:2',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function meja()
    {
        return $this->belongsTo(Meja::class);
    }

    // Tambahkan relasi ke DetailPemesanan di bawah ini:
    public function detailPemesanans()
    {
        return $this->hasMany(DetailPemesanan::class, 'pemesanan_id');
    }

    public function pembayaran()
{
    return $this->hasOne(\App\Models\Pembayaran::class);
}
}