<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Meja extends Model
{
    protected $table = 'mejas';

    protected $fillable = [
        'nomor_meja',
        'kapasitas',
        'status',
        'keterangan',
    ];
    public function transaksis()
{
    return $this->hasMany(\App\Models\Transaksi::class);
}
public function reservasis()
{
    return $this->hasMany(\App\Models\Reservasi::class);
}
}