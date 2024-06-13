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
use Illuminate\Support\Facades\Auth;

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
    $data = Pelanggaran::join('siswas', 'pelanggarans.student_id', '=', 'siswas.id')
        ->join('kelas', 'siswas.class_id', '=', 'kelas.id')
        ->join('kategoris', 'pelanggarans.category_id', '=', 'kategoris.id')
        ->join('sanksis', 'pelanggarans.sanction_id', '=', 'sanksis.id')
        ->join('penggunas', 'pelanggarans.teacher_id', '=', 'penggunas.id')
        ->join('profils', 'penggunas.id', '=', 'profils.user_id')
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
            'profils.id as profile_id',
            'profils.name as teacher_name',
            'profils.phone as phone_number',
            'penggunas.id as user_id',
            'penggunas.email as teacher_email',
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

    public function store(Request $request)
    {
    $request->validate([
        'student_id' => 'required|exists:siswas,id',
        'category_id' => 'required|exists:kategoris,id',
        'sanction_id' => 'required|exists:sanksis,id',
        'date' => 'required',
        'description' => 'required|string|max:255',
    ]);

    $userId = Auth::id();

    $violation = new Pelanggaran;
    $violation->student_id = $request->student_id;
    $violation->category_id = $request->category_id;
    $violation->sanction_id = $request->sanction_id;
    $violation->teacher_id = $userId;
    $violation->date = $request->date;
    $violation->description = $request->description;
    $violation->save();

    return redirect()->back()->with('success', 'Violation added successfully');
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
                'user_id' => 'required|exists:penggunas,id',
            ]);

            $violation = Pelanggaran::findOrFail($request->id);

            $violation->student_id = $request->student_id;
            $violation->category_id = $request->category_id;
            $violation->sanction_id = $request->sanction_id;
            $violation->date = $request->date;
            $violation->description = $request->description;
            $violation->teacher_id = $request->user_id;
            $violation->save();


            return response()->json(['success' => 'Violation updated successfully']);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage() ], 500);
        }
    }

    public function indexTeacher()
    {
        $students = Siswa::all();
        $categories = Kategori::all();
        $sanctions = Sanksi::all();
        $users = Pengguna::where('role', 'guru')->get();
        $profiles = Profil::with('pengguna')->get();
        return view('teacher.violation', compact('students', 'categories', 'sanctions', 'users', 'profiles'));
    }

}


