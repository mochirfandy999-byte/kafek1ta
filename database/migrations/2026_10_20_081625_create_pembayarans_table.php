<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up(): void
{
    Schema::create('pembayarans', function (Blueprint $table) {
        $table->id();
        $table->foreignId('pemesanan_id')->constrained('pemesanans')->onDelete('cascade');
        $table->string('metode_pembayaran'); // 'tunai' atau 'qris'
        $table->decimal('total_bayar', 12, 2);
        $table->decimal('uang_dibayar', 12, 2)->nullable(); // null jika qris
        $table->decimal('kembalian', 12, 2)->default(0);
        $table->enum('status', ['lunas', 'menunggu_pembayaran'])->default('lunas');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayarans');
    }
};
