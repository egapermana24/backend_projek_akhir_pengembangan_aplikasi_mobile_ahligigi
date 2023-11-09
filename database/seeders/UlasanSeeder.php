<?php

namespace Database\Seeders;

use App\Models\Ulasan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UlasanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // id_layanan	id_user	nilai_ulasan	komentar	tanggal_ulasan
        Ulasan::insert([
            [
                'id_layanan' => 1,
                'id_user' => 1,
                'nilai_ulasan' => 5,
                'komentar' => 'Pelayanan yang sangat baik',
                'tanggal_ulasan' => '2021-01-01',
            ],
            [
                'id_layanan' => 2,
                'id_user' => 1,
                'nilai_ulasan' => 4,
                'komentar' => 'Layanan yang memuaskan',
                'tanggal_ulasan' => '2021-02-01',
            ],
            [
                'id_layanan' => 3,
                'id_user' => 1,
                'nilai_ulasan' => 3,
                'komentar' => 'Perlu perbaikan di beberapa aspek',
                'tanggal_ulasan' => '2021-03-01',
            ],
            [
                'id_layanan' => 4,
                'id_user' => 1,
                'nilai_ulasan' => 5,
                'komentar' => 'Sangat puas dengan hasilnya',
                'tanggal_ulasan' => '2021-04-01',
            ],
            [
                'id_layanan' => 5,
                'id_user' => 1,
                'nilai_ulasan' => 2,
                'komentar' => 'Pelayanan kurang memuaskan',
                'tanggal_ulasan' => '2021-05-01',
            ],
            [
                'id_layanan' => 6,
                'id_user' => 1,
                'nilai_ulasan' => 4,
                'komentar' => 'Bagus, tapi bisa ditingkatkan lagi',
                'tanggal_ulasan' => '2021-06-01',
            ],
            [
                'id_layanan' => 7,
                'id_user' => 1,
                'nilai_ulasan' => 1,
                'komentar' => 'Tidak puas dengan pelayanan',
                'tanggal_ulasan' => '2021-07-01',
            ],
            [
                'id_layanan' => 8,
                'id_user' => 1,
                'nilai_ulasan' => 5,
                'komentar' => 'Luar biasa!',
                'tanggal_ulasan' => '2021-08-01',
            ],
            [
                'id_layanan' => 9,
                'id_user' => 1,
                'nilai_ulasan' => 3,
                'komentar' => 'Ok, tapi masih ada kekurangan',
                'tanggal_ulasan' => '2021-09-01',
            ],
            [
                'id_layanan' => 10,
                'id_user' => 1,
                'nilai_ulasan' => 4,
                'komentar' => 'Layanan yang cukup memuaskan',
                'tanggal_ulasan' => '2021-10-01',
            ],
        ]);
        
    }
}
