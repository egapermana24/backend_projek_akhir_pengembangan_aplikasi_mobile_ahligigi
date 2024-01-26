<?php

namespace Database\Seeders;

use App\Models\Pemesanan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PemesananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pemesanan::create([
            // id_layanan	id_user	tanggal_pemesanan	waktu_pemesanan	status_pemesanan	metode_pembayaran
            'id_layanan' => 1,
            'id_user' => 1,
            'tanggal_pemesanan' => '2021-01-01',
            'waktu_pemesanan' => '10:00:00',
            'status_pemesanan' => 'Selesai',
            'metode_pembayaran' => 'Bank',
        ]);
    }
}
