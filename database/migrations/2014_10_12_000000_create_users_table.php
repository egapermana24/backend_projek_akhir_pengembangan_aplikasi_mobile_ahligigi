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
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id_user');
            $table->string('id_google')->nullable()->unique();
            $table->string('nama_user', 100);
            $table->text('foto_user')->nullable();
            $table->string('email')->unique();
            $table->string('password')->nullable();
            $table->string('role', 100);
            $table->string('jenis_kelamin')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
