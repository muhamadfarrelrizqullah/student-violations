<?php

namespace Database\Seeders;

use App\Models\Profil;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProfilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Profil::create([
            'id_pengguna' => 1,
            'nama_lengkap' => 'Muhamad Farrel',
            'no_telepon' => '089123567901',
        ]);
        Profil::create([
            'id_pengguna' => 2,
            'nama_lengkap' => 'Farrel Rizqullah',
            'no_telepon' => '085123456890',
        ]);
    }
}
