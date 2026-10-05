<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();

            // Nomor transaksi
            $table->string('nomor_transaksi')->unique();

            // User/kasir yang membuat transaksi
            $table->foreignId('user_id')
                ->constrained('users')
                ->cascadeOnDelete();

            // Meja yang digunakan
            $table->foreignId('meja_id')
                ->constrained('mejas')
                ->cascadeOnDelete();

            // Nama pelanggan
            $table->string('nama_pelanggan');

            // Tanggal transaksi
            $table->dateTime('tanggal_transaksi');

            // Total pembayaran
            $table->decimal('total_bayar', 12, 2)->default(0);

            // Status transaksi
            $table->string('status')->default('pending');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};