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
            'user_id' => 1,
            'name' => 'Muhamad Farrel',
            'phone' => '089123567901',
        ]);
        Profil::create([
            'user_id' => 2,
            'name' => 'Kimberly',
            'phone' => '089123567901',
        ]);
        Profil::create([
            'user_id' => 3,
            'name' => 'Heru Khan',
            'phone' => '085123456890',
        ]);
        Profil::create([
            'user_id' => 4,
            'name' => 'Victoria',
            'phone' => '085123456890',
        ]);
        Profil::create([
            'user_id' => 5,
            'name' => 'Adeline',
            'phone' => '085123456890',
        ]);
    }
}
