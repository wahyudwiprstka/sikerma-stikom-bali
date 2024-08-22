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
        Schema::create('kerjasama', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('jenis');
            $table->string('status');
            $table->integer('durasi');
            $table->foreignId('bagian');
            $table->date('tanggal_awal')->nullable();
            $table->date('tanggal_berakhir')->nullable();
            $table->foreignId('id_mitra');
            $table->string('bentuk_kerjasama')->nullable();
            $table->string('deskripsi')->nullable();
            $table->string('ttd_pihak1')->nullable();
            $table->string('ttd_pihak2')->nullable();
            $table->string('jabatan_pihak1')->nullable();
            $table->string('jabatan_pihak2')->nullable();
            $table->string('pic_pihak_1')->nullable();
            $table->string('pic_pihak_2')->nullable();
            $table->foreignId('id_mou')->nullable();
            $table->foreignId('id_user');
            $table->foreignId('id_dokumen');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kerjasama');
    }
};
