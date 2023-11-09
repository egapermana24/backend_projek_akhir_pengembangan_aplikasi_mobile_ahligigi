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
        Schema::create('pemesanan', function (Blueprint $table) {
            // id_pemesanan	id_layanan	id_user	tanggal_pemesanan	waktu_pemesanan	status_pemesanan	metode_pembayaran	
            $table->increments('id_pemesanan');
            $table->integer('id_layanan')->unsigned();
            $table->integer('id_user')->unsigned();
            $table->date('tanggal_pemesanan');
            $table->time('waktu_pemesanan');
            $table->string('status_pemesanan', 20);
            $table->string('metode_pembayaran', 20);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemesanan');
    }
};
