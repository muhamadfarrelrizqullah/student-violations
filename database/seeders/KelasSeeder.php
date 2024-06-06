<?php

namespace Database\Seeders;

use App\Models\Kelas;
use Illuminate\Database\Seeder;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kelas::create([
            'name' => 'Kelas 10A',
            'major' => 'IPA'
        ]);
        Kelas::create([
            'name' => 'Kelas 10B',
            'major' => 'IPS'
        ]);
        Kelas::create([
            'name' => 'Kelas 11A',
            'major' => 'IPA'
        ]);
        Kelas::create([
            'name' => 'Kelas 11B',
            'major' => 'IPS'
        ]);
        Kelas::create([
            'name' => 'Kelas 12A',
            'major' => 'IPA'
        ]);
        Kelas::create([
            'name' => 'Kelas 12B',
            'major' => 'IPS'
        ]);
    }
}
