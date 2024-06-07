<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(PenggunaSeeder::class);
        $this->call(KategoriSeeder::class);
        $this->call(KelasSeeder::class);
        $this->call(SanksiSeeder::class);
        $this->call(ProfilSeeder::class);
        $this->call(SiswaSeeder::class);
    }
}
