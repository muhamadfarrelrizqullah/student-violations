<?php

namespace Database\Seeders;

use App\Models\Siswa;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Siswa::create([
            'name' => 'Ahmad',
            'nis' => '1234567890',
            'class_id' => 1, 
        ]);

        Siswa::create([
            'name' => 'Budi',
            'nis' => '0987654321',
            'class_id' => 2, 
        ]);

        Siswa::create([
            'name' => 'Chandra',
            'nis' => '1122334455',
            'class_id' => 3, 
        ]);

        Siswa::create([
            'name' => 'Dewi',
            'nis' => '2233445566',
            'class_id' => 4, 
        ]);

        Siswa::create([
            'name' => 'Eka',
            'nis' => '3344556677',
            'class_id' => 5, 
        ]);
    }
}
