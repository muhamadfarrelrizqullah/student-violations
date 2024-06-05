<?php

namespace Database\Seeders;

use App\Models\Pengguna;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PenggunaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pengguna::create([
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
            'role' => 'Admin',
            'status' => 'Aktif',
        ]);
        Pengguna::create([
            'email' => 'guru@gmail.com',
            'password' => bcrypt('guru'),
            'role' => 'Guru',
            'status' => 'Aktif',
        ]);
    }
}
