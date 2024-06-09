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
        Schema::create('peminjamen', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('no_telpon');
            $table->string('jabatan');
            $table->string('barang');
            $table->integer('jmlh_unit');
            $table->string('aksesoris')->nullable()->default('-');
            $table->string('keperluan');
            $table->string('keterangan')->nullable()->default('-');
            $table->date('pengembalian');
            $table->string('foto_peminjam');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peminjamen');
    }
};
