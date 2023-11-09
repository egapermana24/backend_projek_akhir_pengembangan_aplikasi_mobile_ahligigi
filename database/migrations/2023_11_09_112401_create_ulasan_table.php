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
        Schema::create('ulasan', function (Blueprint $table) {
            // id_ulasan	id_layanan	id_user	nilai_ulasan	komentar	tanggal_ulasan	
            $table->increments('id_ulasan');
            $table->integer('id_layanan')->unsigned();
            $table->integer('id_user')->unsigned();
            $table->integer('nilai_ulasan');
            $table->text('komentar');
            $table->date('tanggal_ulasan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ulasan');
    }
};
