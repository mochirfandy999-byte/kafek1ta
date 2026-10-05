<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservasi extends Model
{
    protected $table = 'reservasis';

    protected $fillable = [
        'nomor_reservasi',
        'meja_id',
        'nama_pelanggan',
        'no_hp',
        'tanggal_reservasi',
        'jam_reservasi',
        'jumlah_orang',
        'status',
        'keterangan',
    ];

    protected $casts = [
        'tanggal_reservasi' => 'date',
    ];

    /**
     * Relasi ke meja
     */
    public function meja()
    {
        return $this->belongsTo(Meja::class);
    }
}