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
        Schema::create('pinjam', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('jumlah_pinjaman');
            $table->date('tanggal_pinjam');
            $table->integer('id_karyawan')->unsigned();
            $table->index('id_karyawan');
            $table->foreign('id_karyawan')->references('id')->on('karyawan')->onDelete('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pinjam');
    }
};
