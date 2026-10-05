<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksis';

    protected $fillable = [
        'nomor_transaksi',
        'user_id',
        'meja_id',
        'nama_pelanggan',
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
}