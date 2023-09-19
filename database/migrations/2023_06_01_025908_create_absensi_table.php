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
        Schema::create('absensi', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamp('jam_masuk')->nullable()->default(null);
            $table->timestamp('jam_pulang')->nullable()->default(null);
            $table->date('hari_masuk');
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
        Schema::dropIfExists('absensi');
    }
};
