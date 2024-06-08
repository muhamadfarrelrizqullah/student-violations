<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelanggaran;
use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\Pengguna;
use App\Models\Profil;
use App\Models\Kategori;
use App\Models\Sanksi;
use Yajra\DataTables\Facades\DataTables;

class PelanggaranController extends Controller
{
    public function index()
    {
        return view('admin.violation');
    }

    public function read()
    {
    $data = Pelanggaran::join('siswas', 'pelanggarans.siswa_id', '=', 'siswas.id')
        ->join('kelas', 'siswas.kelas_id', '=', 'kelas.id')
        ->join('kategoris', 'pelanggarans.kategori_id', '=', 'kategoris.id')
        ->join('sanksis', 'pelanggarans.sanksi_id', '=', 'sanksis.id')
        ->join('pengguna', 'pelanggarans.guru_id', '=', 'pengguna.id')
        ->join('profil', 'pengguna.id', '=', 'profil.id_pengguna')
        ->select([
            'pelanggarans.id',
            'siswas.id as student_id',
            'siswas.name as student_name',
            'siswas.nis',
            'kelas.id as class_id',
            'kelas.name as class_name',
            'kategoris.id as category_id',
            'kategoris.name as category_name',
            'pelanggarans.date',
            'pelanggarans.description',
            'sanksis.id as sanction_id',
            'sanksis.name as sanction_name',
            'profil.id as profile_id',
            'profil.nama_lengkap as teacher_name',
            'profil.no_telepon as phone_number',
            'pengguna.id as user_id',
            'pengguna.email as teacher_email',
        ])
        ->get();

    return datatables()->of($data)
        ->addIndexColumn()
        ->make(true);
    }

}


