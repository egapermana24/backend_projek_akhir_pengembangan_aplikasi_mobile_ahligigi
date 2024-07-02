<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert([
            [
                'nama_user' => 'Admin',
                'foto_user' => 'admin.png',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('admin'),
                'role' => 'admin',
                'jenis_kelamin' => 'Laki-laki'
            ],
            [
                'nama_user' => 'Resepsionis',
                'foto_user' => 'resepsionis.png',
                'email' => 'resepsionis@gmail.com',
                'password' => bcrypt('resepsionis'),
                'role' => 'resepsionis',
                'jenis_kelamin' => 'Laki-laki'
            ],
            [
                'nama_user' => 'drg. Dokter1',
                'foto_user' => 'dokter1.png',
                'email' => 'dokter1@gmail.com',
                'password' => bcrypt('dokter1'),
                'role' => 'dokter',
                'jenis_kelamin' => 'Laki-laki'
            ],
            [
                'nama_user' => 'drg. Dokter2',
                'foto_user' => 'dokter2.png',
                'email' => 'dokter2@gmail.com',
                'password' => bcrypt('dokter2'),
                'role' => 'dokter',
                'jenis_kelamin' => 'Laki-laki'
            ],
            [
                'nama_user' => 'drg. Dokter3',
                'foto_user' => 'dokter3.png',
                'email' => 'dokter3@gmail.com',
                'password' => bcrypt('dokter3'),
                'role' => 'dokter',
                'jenis_kelamin' => 'Laki-laki'
            ],
            [
                'nama_user' => 'drg. Dokter4',
                'foto_user' => 'dokter4.png',
                'email' => 'dokter4@gmail.com',
                'password' => bcrypt('dokter4'),
                'role' => 'dokter',
                'jenis_kelamin' => 'Laki-laki'
            ],
            [
                'nama_user' => 'drg. Dokter5',
                'foto_user' => 'dokter5.png',
                'email' => 'dokter5@gmail.com',
                'password' => bcrypt('dokter5'),
                'role' => 'dokter',
                'jenis_kelamin' => 'Laki-laki'
            ],
            [
                'nama_user' => 'drg. Dokter6',
                'foto_user' => 'dokter6.png',
                'email' => 'dokter6@gmail.com',
                'password' => bcrypt('dokter6'),
                'role' => 'dokter',
                'jenis_kelamin' => 'Laki-laki'
            ],
            [
                'nama_user' => 'drg. Dokter7',
                'foto_user' => 'dokter7.png',
                'email' => 'dokter7@gmail.com',
                'password' => bcrypt('dokter7'),
                'role' => 'dokter',
                'jenis_kelamin' => 'Laki-laki'
            ],
            [
                'nama_user' => 'drg. Dokter8',
                'foto_user' => 'dokter8.png',
                'email' => 'dokter8@gmail.com',
                'password' => bcrypt('dokter8'),
                'role' => 'dokter',
                'jenis_kelamin' => 'Laki-laki'
            ],
            [
                'nama_user' => 'drg. Dokter9',
                'foto_user' => 'dokter9.png',
                'email' => 'dokter9@gmail.com',
                'password' => bcrypt('dokter9'),
                'role' => 'dokter',
                'jenis_kelamin' => 'Laki-laki'
            ],
            [
                'nama_user' => 'drg. Dokter10',
                'foto_user' => 'dokter10.png',
                'email' => 'dokter10@gmail.com',
                'password' => bcrypt('dokter10'),
                'role' => 'dokter',
                'jenis_kelamin' => 'Laki-laki'
            ],
        ]);
    }
}
