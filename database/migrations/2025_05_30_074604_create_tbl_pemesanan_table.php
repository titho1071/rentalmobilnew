<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblPemesananTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tbl_pemesanan', function (Blueprint $table) {
            $table->string('id_Penyewaan')->primary();
            $table->string('nama_penyewa');
            $table->string('kode_mobil');
            $table->string('email');
            $table->text('alamat');
            $table->date('tanggal_pengambilan')->nullable();
            $table->date('tanggal_pengembalian')->nullable();
            $table->string('alamat_pengambilan');
            $table->string('no_rekening_penjual');
            $table->decimal('total_pembayaran', 15, 2);
            $table->string('bukti_pembayaran')->nullable();

            // Kolom enum untuk status
            $table->enum('status', ['Menunggu', 'Konfirmasi', 'Batal'])->default('Menunggu');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_pemesanan');
    }
}
