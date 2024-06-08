<?php

namespace Database\Seeders;

use App\Models\Pelanggaran;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PelanggaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pelanggaran::create([
            'siswa_id' => 1, 
            'kategori_id' => 1, 
            'sanksi_id' => 1,
            'guru_id' => 2,
            'date' => Carbon::now(), 
            'description' => 'Terlambat', 
        ]);

        Pelanggaran::create([
            'siswa_id' => 2, 
            'kategori_id' => 2, 
            'sanksi_id' => 2,
            'guru_id' => 2,
            'date' => Carbon::now(),
            'description' => 'Tidak memakai seragam', 
        ]);

        Pelanggaran::create([
            'siswa_id' => 3, 
            'kategori_id' => 3, 
            'sanksi_id' => 3,
            'guru_id' => 2,
            'date' => Carbon::now(), 
            'description' => 'Bolos', 
        ]);

        Pelanggaran::create([
            'siswa_id' => 4, 
            'kategori_id' => 4, 
            'sanksi_id' => 4,
            'guru_id' => 2,
            'date' => Carbon::now(), 
            'description' => 'Merokok', 
        ]);

        Pelanggaran::create([
            'siswa_id' => 5, 
            'kategori_id' => 5, 
            'sanksi_id' => 5,
            'guru_id' => 2,
            'date' => Carbon::now(),
            'description' => 'Berkelahi',
        ]);
    }
}
