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
        Schema::create('gaji', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('angsuran_mingguan');
            $table->integer('simpanan_wajib');
            $table->integer('jumlah_gaji');
            $table->integer('id_karyawan')->unsigned();
            $table->index('id_karyawan');
            $table->integer('id_pinjaman')->unsigned();
            $table->index('id_pinjaman');
            $table->foreign('id_karyawan')->references('id')->on('karyawan')->onDelete('restrict');
            $table->foreign('id_pinjaman')->references('id')->on('pinjam')->onDelete('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gaji');
    }
};
