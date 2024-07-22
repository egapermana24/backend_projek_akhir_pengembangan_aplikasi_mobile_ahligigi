<?php

namespace Database\Seeders;

use App\Models\Layanan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class LayananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Daftar nama gambar yang valid
        $gambar_layanan = [
            'tambalgigi.jpg',
            'pembersihangigi.jpg',
            'behelgigi.jpg',
            'pengobatanakargigi.jpg',
            'pemasangangigipalsu.jpg',
            'pemutihangigi.jpg',
            'konsutasigigi.jpg',
            'operasigigibungsu.jpg',
            'pemulihansetelahbedah.jpg',
            'skalabilitaspelayanangigi.jpg'
        ];

        // Daftar nama layanan, harga, dan deskripsi sesuai gambar dengan harga minimum yang diambil dari rentang
        $layanan = [
            ['nama_layanan' => 'Konsultasi & General Screening', 'harga' => 88000, 'gambar_layanan' => $gambar_layanan[array_rand($gambar_layanan)], 'durasi' => 30, 'deskripsi' => 'Konsultasi & General Screening untuk mengetahui kondisi gigi secara umum.'],
            ['nama_layanan' => 'Konsultasi Spesialis', 'harga' => 150000, 'gambar_layanan' => $gambar_layanan[array_rand($gambar_layanan)], 'durasi' => 30, 'deskripsi' => 'Konsultasi dengan spesialis untuk masalah gigi dan mulut yang lebih kompleks.'],
            ['nama_layanan' => 'Dental Spa', 'harga' => 660000, 'gambar_layanan' => $gambar_layanan[array_rand($gambar_layanan)], 'durasi' => 60, 'deskripsi' => 'Perawatan gigi dengan metode spa untuk relaksasi dan kebersihan.'],
            ['nama_layanan' => 'Whitening', 'harga' => 2750000, 'gambar_layanan' => $gambar_layanan[array_rand($gambar_layanan)], 'durasi' => 60, 'deskripsi' => 'Prosedur pemutihan gigi untuk senyum yang lebih cerah.'],
            ['nama_layanan' => 'Snap On Smile 1 Rahang', 'harga' => 8500000, 'gambar_layanan' => $gambar_layanan[array_rand($gambar_layanan)], 'durasi' => 90, 'deskripsi' => 'Prosedur Snap On Smile untuk satu rahang guna memperbaiki estetika gigi.'],
            ['nama_layanan' => 'Veneer Direct Per 1 Gigi', 'harga' => 1000000, 'gambar_layanan' => $gambar_layanan[array_rand($gambar_layanan)], 'durasi' => 45, 'deskripsi' => 'Pemasangan veneer direct pada satu gigi untuk memperbaiki tampilan.'],
            ['nama_layanan' => 'Veneer Indirect Per 1 Gigi', 'harga' => 3750000, 'gambar_layanan' => $gambar_layanan[array_rand($gambar_layanan)], 'durasi' => 60, 'deskripsi' => 'Pemasangan veneer indirect pada satu gigi untuk hasil yang lebih baik.'],
            ['nama_layanan' => 'Penambalan Sementara', 'harga' => 150000, 'gambar_layanan' => $gambar_layanan[array_rand($gambar_layanan)], 'durasi' => 30, 'deskripsi' => 'Penambalan sementara untuk gigi berlubang sebelum perawatan lanjut.'],
            ['nama_layanan' => 'Penambalan Composite/Art (Fuji)', 'harga' => 385000, 'gambar_layanan' => $gambar_layanan[array_rand($gambar_layanan)], 'durasi' => 45, 'deskripsi' => 'Penambalan dengan bahan composite atau art untuk estetika yang baik.'],
            ['nama_layanan' => 'Penambalan Estetik', 'harga' => 500000, 'gambar_layanan' => $gambar_layanan[array_rand($gambar_layanan)], 'durasi' => 60, 'deskripsi' => 'Penambalan estetis untuk tampilan gigi yang lebih alami.'],
            ['nama_layanan' => 'Pencabutan Sulung', 'harga' => 100000, 'gambar_layanan' => $gambar_layanan[array_rand($gambar_layanan)], 'durasi' => 30, 'deskripsi' => 'Pencabutan gigi sulung untuk anak-anak.'],
            ['nama_layanan' => 'Pencabutan Dewasa', 'harga' => 385000, 'gambar_layanan' => $gambar_layanan[array_rand($gambar_layanan)], 'durasi' => 45, 'deskripsi' => 'Pencabutan gigi pada pasien dewasa.'],
            ['nama_layanan' => 'Pencabutan Penyulit', 'harga' => 660000, 'gambar_layanan' => $gambar_layanan[array_rand($gambar_layanan)], 'durasi' => 60, 'deskripsi' => 'Pencabutan gigi yang sulit dengan teknik khusus.'],
            ['nama_layanan' => 'Gingivektomy', 'harga' => 350000, 'gambar_layanan' => $gambar_layanan[array_rand($gambar_layanan)], 'durasi' => 60, 'deskripsi' => 'Prosedur pengangkatan jaringan gusi untuk perawatan penyakit gusi.'],
            ['nama_layanan' => 'Inlay / Onlay', 'harga' => 1800000, 'gambar_layanan' => $gambar_layanan[array_rand($gambar_layanan)], 'durasi' => 90, 'deskripsi' => 'Prosedur restorasi gigi dengan inlay atau onlay.'],
            ['nama_layanan' => 'Implant Gigi', 'harga' => 12000000, 'gambar_layanan' => $gambar_layanan[array_rand($gambar_layanan)], 'durasi' => 120, 'deskripsi' => 'Pemasangan implan gigi untuk menggantikan gigi yang hilang.'],
            ['nama_layanan' => 'Odontektomy', 'harga' => 1500000, 'gambar_layanan' => $gambar_layanan[array_rand($gambar_layanan)], 'durasi' => 90, 'deskripsi' => 'Operasi pengangkatan gigi yang terpendam atau terhalang.'],
            ['nama_layanan' => 'Pencabutan Gigi Bungsu', 'harga' => 1500000, 'gambar_layanan' => $gambar_layanan[array_rand($gambar_layanan)], 'durasi' => 90, 'deskripsi' => 'Pencabutan gigi bungsu yang bermasalah.'],
            ['nama_layanan' => 'Perawatan Saluran Akar', 'harga' => 250000, 'gambar_layanan' => $gambar_layanan[array_rand($gambar_layanan)], 'durasi' => 60, 'deskripsi' => 'Perawatan saluran akar untuk gigi yang infeksi atau rusak.'],
            ['nama_layanan' => 'Scaling', 'harga' => 385000, 'gambar_layanan' => $gambar_layanan[array_rand($gambar_layanan)], 'durasi' => 45, 'deskripsi' => 'Pembersihan karang gigi untuk kesehatan gigi dan gusi.'],
            ['nama_layanan' => 'Braces Roth', 'harga' => 4000000, 'gambar_layanan' => $gambar_layanan[array_rand($gambar_layanan)], 'durasi' => 120, 'deskripsi' => 'Pemasangan behel metal dengan metode Roth.'],
            ['nama_layanan' => 'Braces Clear', 'harga' => 7000000, 'gambar_layanan' => $gambar_layanan[array_rand($gambar_layanan)], 'durasi' => 120, 'deskripsi' => 'Pemasangan behel clear untuk tampilan yang lebih estetik.'],
            ['nama_layanan' => 'Lingual Braces', 'harga' => 10000000, 'gambar_layanan' => $gambar_layanan[array_rand($gambar_layanan)], 'durasi' => 120, 'deskripsi' => 'Pemasangan behel lingual yang tersembunyi di belakang gigi.'],
            ['nama_layanan' => 'Braces Self-ligating Damon', 'harga' => 16000000, 'gambar_layanan' => $gambar_layanan[array_rand($gambar_layanan)], 'durasi' => 120, 'deskripsi' => 'Pemasangan behel self-ligating dengan metode Damon.'],
            ['nama_layanan' => 'Braces Self-ligating Damon Clear', 'harga' => 25000000, 'gambar_layanan' => $gambar_layanan[array_rand($gambar_layanan)], 'durasi' => 120, 'deskripsi' => 'Pemasangan behel self-ligating Damon dengan bahan clear.'],
            ['nama_layanan' => 'Braces Self-ligating Non Damon', 'harga' => 10000000, 'gambar_layanan' => $gambar_layanan[array_rand($gambar_layanan)], 'durasi' => 120, 'deskripsi' => 'Pemasangan behel self-ligating non Damon.'],
            ['nama_layanan' => 'Invisalign', 'harga' => 50000000, 'gambar_layanan' => $gambar_layanan[array_rand($gambar_layanan)], 'durasi' => 120, 'deskripsi' => 'Pemasangan Invisalign untuk koreksi gigi dengan alat yang hampir tidak terlihat.'],
        ];

        // Proses untuk menyimpan data layanan ke database
        foreach ($layanan as $layanan_item) {
            DB::table('layanan')->insert([
                'nama_layanan' => $layanan_item['nama_layanan'],
                'harga' => $layanan_item['harga'],
                'gambar_layanan' => $layanan_item['gambar_layanan'],
                'durasi' => $layanan_item['durasi'],
                'deskripsi' => $layanan_item['deskripsi'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
