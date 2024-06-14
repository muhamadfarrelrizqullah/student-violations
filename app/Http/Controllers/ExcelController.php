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
    public function exportViolation(Request $request)
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

    public function exportSanction(Request $request)
    {

        $data = Sanksi::select(['id', 'name', 'points'])
        ->get(); 

        return (new FastExcel($data))->download('sanction_report.xlsx');
    }

    public function exportClass(Request $request)
    {

        $data = Kelas::select(['id', 'name', 'major'])
        ->get(); 

        return (new FastExcel($data))->download('class_report.xlsx');
    }

    public function exportUser(Request $request)
    {

        $data = Pengguna::leftJoin('profils', 'penggunas.id', '=', 'profils.user_id')
        ->select(['penggunas.id', 'penggunas.email', 'penggunas.role', 'penggunas.status', 'profils.name', 'profils.phone'])
        ->get(); 

        return (new FastExcel($data))->download('user_report.xlsx');
    }

    public function exportViolationDashboard(Request $request)
    {
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);
        
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        $formattedStartDate = date('Y-m-d', strtotime($start_date));
        $formattedEndDate = date('Y-m-d', strtotime($end_date));

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
            'kelas.major',
            'kategoris.name as category_name',
            'sanksis.name as sanction_name',
            'sanksis.points',
            'pelanggarans.date',
            'pelanggarans.description',
            'profils.name as teacher_name',
            'profils.phone as phone_number',
            'penggunas.email as teacher_email',
        ])
        ->whereBetween('date', [$formattedStartDate, $formattedEndDate])
        ->get();

        return (new FastExcel($data))->download('violation_report.xlsx');
    }
}
