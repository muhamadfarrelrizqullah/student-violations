<?php

namespace Database\Seeders;

use App\Models\Pelanggaran;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PelanggaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pelanggaran::create([
            'student_id' => 1, 
            'category_id' => 1, 
            'sanction_id' => 1,
            'teacher_id' => 2,
            'date' => Carbon::now(), 
            'description' => 'Terlambat', 
        ]);

        Pelanggaran::create([
            'student_id' => 2, 
            'category_id' => 2, 
            'sanction_id' => 2,
            'teacher_id' => 2,
            'date' => Carbon::now(),
            'description' => 'Tidak memakai seragam', 
        ]);

        Pelanggaran::create([
            'student_id' => 3, 
            'category_id' => 3, 
            'sanction_id' => 3,
            'teacher_id' => 2,
            'date' => Carbon::now(), 
            'description' => 'Bolos', 
        ]);

        Pelanggaran::create([
            'student_id' => 4, 
            'category_id' => 4, 
            'sanction_id' => 4,
            'teacher_id' => 2,
            'date' => Carbon::now(), 
            'description' => 'Merokok', 
        ]);

        Pelanggaran::create([
            'student_id' => 5, 
            'category_id' => 5, 
            'sanction_id' => 5,
            'teacher_id' => 2,
            'date' => Carbon::now(),
            'description' => 'Berkelahi',
        ]);
    }
}
