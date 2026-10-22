<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $fillable = [
        'pemesanan_id',
        'metode_pembayaran',
        'total_bayar',
        'uang_dibayar',
        'kembalian',
        'status',
    ];

    public function pemesanan()
    {
        return $this->belongsTo(Pemesanan::class);
    }
}
