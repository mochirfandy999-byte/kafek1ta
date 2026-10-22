<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPemesanan extends Model
{
    use HasFactory;

    protected $fillable = [
        'pemesanan_id',
        'menu_id',
        'harga_satuan',
        'jumlah',
        'subtotal',
    ];

    // Relasi balik ke Pemesanan
    public function pemesanan()
    {
        return $this->belongsTo(Pemesanan::class);
    }

    // Relasi untuk mengambil nama menu & data menu terkait
    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }
}