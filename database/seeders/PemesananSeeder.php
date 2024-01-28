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
        Pemesanan::insert([
            [
                'id_layanan' => 1,
                'id_user' => 1,
                // 'id_google' => 1,
                'tanggal_pemesanan' => '2021-01-01',
                'waktu_pemesanan' => '10:00:00',
                'status_pemesanan' => 'Selesai',
                'metode_pembayaran' => 'Bank',
                'bukti_pembayaran' => 'bukti_pembayaran.png',
            ],
            [
                'id_layanan' => 2,
                'id_user' => 1,
                // 'id_google' => 1,
                'tanggal_pemesanan' => '2021-02-01',
                'waktu_pemesanan' => '13:00:00',
                'status_pemesanan' => 'Menunggu Konfirmasi',
                'metode_pembayaran' => 'Dompet Digital',
                'bukti_pembayaran' => 'bukti_pembayaran.png',
            ],
            [
                'id_layanan' => 3,
                'id_user' => 1,
                // 'id_google' => 1,
                'tanggal_pemesanan' => '2021-08-01',
                'waktu_pemesanan' => '16:00:00',
                'status_pemesanan' => 'Menunggu Kunjungan',
                'metode_pembayaran' => 'Dompet Digital',
                'bukti_pembayaran' => 'bukti_pembayaran.png',
            ],
            [
                'id_layanan' => 4,
                'id_user' => 1,
                // 'id_google' => 1,
                'tanggal_pemesanan' => '2024-09-01',
                'waktu_pemesanan' => '16:00:00',
                'status_pemesanan' => 'Tidak Valid',
                'metode_pembayaran' => 'COD',
                'bukti_pembayaran' => 'bukti_pembayaran.png',
            ]

        ]);
    }
}
