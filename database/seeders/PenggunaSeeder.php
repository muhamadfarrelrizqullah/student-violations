<?php

namespace Database\Seeders;

use App\Models\Pengguna;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

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
            'email' => 'admin2@gmail.com',
            'password' => bcrypt('admin'),
            'role' => 'Admin',
            'status' => 'Aktif',
        ]);
        Pengguna::create([
            'email' => 'teacher@gmail.com',
            'password' => bcrypt('teacher'),
            'role' => 'Guru',
            'status' => 'Aktif',
        ]);
        Pengguna::create([
            'email' => 'teacher2@gmail.com',
            'password' => bcrypt('teacher'),
            'role' => 'Guru',
            'status' => 'Aktif',
        ]);
        Pengguna::create([
            'email' => 'teacher3@gmail.com',
            'password' => bcrypt('teacher'),
            'role' => 'Guru',
            'status' => 'Aktif',
        ]);
    }
}
