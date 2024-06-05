<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('pendaftarans', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->char('nim');
            $table->string('prodi');
            $table->string('email');
            $table->string('semester');
            $table->char('no_telp');
            $table->binary('cv')->nullable();
            $table->string('divisi_1');
            $table->string('divisi_2')->nullable()->default(null);
            $table->enum('jabatan', ['Ketua', 'Wakil Ketua', 'Skeretaris', 'Bendahara', 'Anggota'])->default('Anggota');
            $table->string('status')->default('menunggu');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftarans');
    }
};
