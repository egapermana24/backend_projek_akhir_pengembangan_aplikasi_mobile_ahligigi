<?php

namespace Database\Seeders;

use App\Models\ProfilAhliGigi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProfilAhliGigiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // nama_ahligigi	foto_ahligigi	alamat_ahligigi	no_tel_ahligigi	jam_buka	jam_tutup	sertifikasi	
        ProfilAhliGigi::create([
            'nama_ahligigi' => 'Acenk',
            'foto_ahligigi' => 'acenk.jpg',
            'alamat_ahligigi' => 'Jl. Raya Cipadung No. 9, Bandung',
            'no_tel_ahligigi' => '081234567890',
            'jam_buka' => '08:00:00',
            'jam_tutup' => '16:00:00',
            'sertifikasi' => 'Sertifikasi 1, Sertifikasi 2',
        ]);
    }
}
