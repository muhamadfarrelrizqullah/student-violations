<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session; 
use Rap2hpoutre\FastExcel\FastExcel;
use App\Models\Pelanggaran;
use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\Pengguna;
use App\Models\Profil;
use App\Models\Kategori;
use App\Models\Sanksi;
use Carbon\Carbon;

class ExcelController extends Controller
{
    public function exportViolationAdmin(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
        ]);
        
        $date = $request->input('date');
        $formattedDate = date('Y-m-d', strtotime($date));

        $data = Pelanggaran::join('siswas', 'pelanggarans.student_id', '=', 'siswas.id')
        ->join('kelas', 'siswas.class_id', '=', 'kelas.id')
        ->join('kategoris', 'pelanggarans.category_id', '=', 'kategoris.id')
        ->join('sanksis', 'pelanggarans.sanction_id', '=', 'sanksis.id')
        ->join('penggunas', 'pelanggarans.teacher_id', '=', 'penggunas.id')
        ->join('profils', 'penggunas.id', '=', 'profils.user_id')
        ->select([
            'pelanggarans.id',
            'siswas.name as student_name',
            'siswas.nis',
            'kelas.name as class_name',
            'kategoris.name as category_name',
            'pelanggarans.date',
            'pelanggarans.description',
            'sanksis.name as sanction_name',
            'profils.name as teacher_name',
            'profils.phone as phone_number',
            'penggunas.email as teacher_email',
        ])
        ->whereDate('date', $formattedDate)
        ->get();

        return (new FastExcel($data))->download('violation_report.xlsx');
    }

    public function exportStudent(Request $request)
    {

        $data = Siswa::leftJoin('kelas', 'kelas.id', '=', 'siswas.class_id')
        ->select(['siswas.id', 'siswas.name', 'siswas.nis', 'kelas.name as class_name', 'kelas.major'])
        ->get();

        return (new FastExcel($data))->download('student_report.xlsx');
    }

    public function exportCategory(Request $request)
    {

        $data = Kategori::select(['id', 'name', 'description'])
        ->get(); 

        return (new FastExcel($data))->download('category_report.xlsx');
    }
}
