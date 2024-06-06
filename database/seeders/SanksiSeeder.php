<?php

namespace Database\Seeders;

use App\Models\Sanksi;
use Illuminate\Database\Seeder;

class SanksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Sanksi::create([
            'name' => 'Teguran',
            'points' => 5
        ]);
        Sanksi::create([
            'name' => 'Peringatan Tertulis',
            'points' => 10
        ]);
        Sanksi::create([
            'name' => 'Skorsing',
            'points' => 20
        ]);
        Sanksi::create([
            'name' => 'Dikeluarkan Sementara',
            'points' => 50
        ]);
        Sanksi::create([
            'name' => 'Dikeluarkan Permanen',
            'points' => 100
        ]);
    }
}
