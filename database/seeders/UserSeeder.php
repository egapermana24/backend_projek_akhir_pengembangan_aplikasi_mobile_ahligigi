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
        User::create([
            'nama_user' => 'Admin',
            'foto_user' => 'admin.png',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
            'no_telepon' => '081234567890',
            'role' => 'admin',
        ]);
    }
}
