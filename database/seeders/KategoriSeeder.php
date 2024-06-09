<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kategori::create([
            'name' => 'Terlambat',
            'description' => 'Siswa yang datang terlambat ke sekolah atau kelas.'
        ]);
        Kategori::create([
            'name' => 'Tidak memakai seragam',
            'description' => 'Siswa yang tidak memakai seragam sesuai peraturan sekolah.'
        ]);
        Kategori::create([
            'name' => 'Bolos',
            'description' => 'Siswa yang tidak hadir tanpa keterangan atau ijin.'
        ]);
        Kategori::create([
            'name' => 'Merokok',
            'description' => 'Siswa yang kedapatan merokok di lingkungan sekolah.'
        ]);
        Kategori::create([
            'name' => 'Berkelahi',
            'description' => 'Siswa yang terlibat dalam perkelahian dengan siswa lain.'
        ]);
    }
}
