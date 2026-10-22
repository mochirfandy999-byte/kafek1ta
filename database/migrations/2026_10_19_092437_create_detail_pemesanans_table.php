<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('detail_pemesanans', function (Blueprint $table) {
            $table->id();
            // Menghubungkan ke tabel pemesanans (otomatis terhapus jika pemesanan dihapus)
            $table->foreignId('pemesanan_id')->constrained('pemesanans')->onDelete('cascade');
            
            // Menghubungkan ke tabel menus
            $table->foreignId('menu_id')->constrained('menus')->onDelete('cascade');
            
            $table->decimal('harga_satuan', 12, 2);
            $table->integer('jumlah');
            $table->decimal('subtotal', 12, 2);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('detail_pemesanans');
    }
};