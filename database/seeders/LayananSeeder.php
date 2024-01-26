<?php

namespace Database\Seeders;

use App\Models\Layanan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class LayananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Layanan::insert([
            [
                'nama_layanan' => 'Tambal Gigi',
                'gambar_layanan' => 'tambalgigi.jpg',
                'harga' => 100000,
                'durasi' => 45,
                'deskripsi' => 'Tambal gigi adalah prosedur perawatan gigi yang dilakukan untuk mengembalikan bentuk gigi yang rusak akibat kerusakan gigi berlubang atau karies. Proses tambal gigi dilakukan dengan cara membersihkan karies, membersihkan sisa-sisa makanan, dan mengisi lubang gigi dengan bahan tambal.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama_layanan' => 'Pembersihan Gigi',
                'gambar_layanan' => 'pembersihangigi.jpg',
                'harga' => 80000,
                'durasi' => 30,
                'deskripsi' => 'Pembersihan gigi adalah prosedur untuk menghilangkan plak dan karang gigi guna menjaga kebersihan dan kesehatan gigi. Proses ini melibatkan pembersihan permukaan gigi, gusi, dan daerah sekitarnya.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama_layanan' => 'Behel Gigi',
                'gambar_layanan' => 'behelgigi.jpg',
                'harga' => 1500000,
                'durasi' => 365,
                'deskripsi' => 'Behel gigi atau kawat gigi adalah perangkat ortodontik yang digunakan untuk merapihkan dan memperbaiki posisi gigi. Proses pemasangan behel memerlukan perencanaan yang cermat dan pemantauan rutin selama penggunaan.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama_layanan' => 'Pengobatan Akar Gigi',
                'gambar_layanan' => 'pengobatanakargigi.jpg',
                'harga' => 1200000,
                'durasi' => 60,
                'deskripsi' => 'Pengobatan akar gigi diperlukan untuk mengatasi masalah pada akar gigi seperti infeksi atau radang. Prosedur ini melibatkan pengangkatan jaringan yang terinfeksi dan penyembuhan akar gigi.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama_layanan' => 'Pemasangan Gigi Palsu',
                'gambar_layanan' => 'pemasangangigipalsu.jpg',
                'harga' => 2000000,
                'durasi' => 90,
                'deskripsi' => 'Pemasangan gigi palsu dilakukan untuk menggantikan gigi yang hilang. Proses ini melibatkan pencetakan gigi palsu yang sesuai dengan bentuk dan warna gigi asli.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama_layanan' => 'Pemutihan Gigi',
                'gambar_layanan' => 'pemutihangigi.jpg',
                'harga' => 150000,
                'durasi' => 60,
                'deskripsi' => 'Pemutihan gigi adalah prosedur kosmetik untuk memutihkan gigi yang mengalami perubahan warna atau noda. Proses ini dapat dilakukan dengan bantuan bahan pemutih khusus.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama_layanan' => 'Konsultasi Gigi',
                'gambar_layanan' => 'konsultasigigi.jpg',
                'harga' => 50000,
                'durasi' => 30,
                'deskripsi' => 'Konsultasi gigi adalah pertemuan dengan ahli gigi untuk mendapatkan informasi, saran, atau rencana perawatan gigi. Proses ini membantu pengguna memahami kebutuhan kesehatan gigi mereka.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama_layanan' => 'Operasi Gigi Bungsu',
                'gambar_layanan' => 'operasigigibungsu.jpg',
                'harga' => 1800000,
                'durasi' => 90,
                'deskripsi' => 'Operasi gigi bungsu diperlukan ketika gigi bungsu tumbuh tidak normal atau menyebabkan masalah kesehatan. Prosedur ini melibatkan pengangkatan gigi bungsu dengan pembedahan.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama_layanan' => 'Pemulihan Setelah Bedah',
                'gambar_layanan' => 'pemulihansetelahbedah.jpg',
                'harga' => 1200000,
                'durasi' => 60,
                'deskripsi' => 'Pemulihan setelah bedah gigi melibatkan perawatan pasca operasi untuk memastikan pemulihan yang optimal. Proses ini mencakup perawatan luka, pengontrolan nyeri, dan instruksi pasca operasi.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama_layanan' => 'Skalabilitas Pelayanan Gigi',
                'gambar_layanan' => 'skalabilitaspelayanangigi.jpg',
                'harga' => 2500000,
                'durasi' => 120,
                'deskripsi' => 'Skalabilitas pelayanan gigi mencakup evaluasi menyeluruh dan perencanaan untuk meningkatkan kapasitas dan kualitas pelayanan gigi. Proses ini melibatkan identifikasi area perbaikan dan implementasi solusi yang efektif.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
