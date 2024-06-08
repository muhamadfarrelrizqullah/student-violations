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
        $students = Siswa::all();
        $categories = Kategori::all();
        $sanctions = Sanksi::all();
        $users = Pengguna::where('role', 'guru')->get();
        $profiles = Profil::with('pengguna')->get();
        return view('admin.violation', compact('students', 'categories', 'sanctions', 'users', 'profiles'));
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

    public function destroy($id)
    {
    $pelanggaran = Pelanggaran::find($id);
    if (!$pelanggaran) {
        return response()->json(['message' => 'Violation not found.'], 404);
    }
    $pelanggaran->delete();
    return response()->json(['message' => 'Violation deleted successfully.']);
    }

    public function update(Request $request)
    {
        try {

            $request->validate([
                'student_id' => 'required|exists:siswas,id',
                'category_id' => 'required|exists:kategoris,id',
                'sanction_id' => 'required|exists:sanksis,id',
                'date' => 'required',
                'description' => 'required|string|max:255',
                'user_id' => 'required|exists:pengguna,id',
            ]);

            $violation = Pelanggaran::findOrFail($request->id);

            $violation->siswa_id = $request->student_id;
            $violation->kategori_id = $request->category_id;
            $violation->sanksi_id = $request->sanction_id;
            $violation->date = $request->date;
            $violation->description = $request->description;
            $violation->guru_id = $request->user_id;
            $violation->save();


            return response()->json(['success' => 'Violation updated successfully']);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage() ], 500);
        }
    }

}


