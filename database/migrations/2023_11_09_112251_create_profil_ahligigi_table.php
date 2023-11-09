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
        Schema::create('profil_ahligigi', function (Blueprint $table) {
            // id_ahligigi	nama_ahligigi	foto_ahligigi	alamat_ahligigi	no_tel_ahligigi	jam_buka	jam_tutup	sertifikasi	
            $table->increments('id_ahligigi');
            $table->string('nama_ahligigi', 100);
            $table->text('foto_ahligigi');
            $table->text('alamat_ahligigi');
            $table->string('no_tel_ahligigi', 15);
            $table->time('jam_buka');
            $table->time('jam_tutup');
            $table->text('sertifikasi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profil_ahligigi');
    }
};
