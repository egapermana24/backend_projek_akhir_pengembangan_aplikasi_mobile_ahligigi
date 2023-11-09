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
        Schema::create('layanan', function (Blueprint $table) {
            // id_layanan	nama_layanan	gambar_layanan	harga	durasi	deskripsi	
            $table->increments('id_layanan');
            $table->string('nama_layanan', 100);
            $table->text('gambar_layanan');
            $table->float('harga');
            $table->integer('durasi');
            $table->text('deskripsi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('layanan');
    }
};
