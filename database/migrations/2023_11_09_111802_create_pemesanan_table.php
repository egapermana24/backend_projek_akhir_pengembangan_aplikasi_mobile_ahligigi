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
            $table->increments('id_pemesanan');
            $table->integer('id_layanan')->unsigned();
            $table->integer('id_user')->unsigned();
            $table->string('id_google')->nullable();
            $table->integer('id_dokter')->nullable();
            $table->date('tanggal_pemesanan');
            $table->time('waktu_pemesanan');
            $table->string('status_pemesanan', 20);
            $table->string('status_member', 20)->nullable();
            $table->text('hasil_analisa')->nullable();
            $table->string('saran_layanan', 50)->nullable();
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
