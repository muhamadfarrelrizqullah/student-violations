<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\Kelas;
use Yajra\DataTables\Facades\DataTables;

class SiswaController extends Controller
{
    public function index()
    {
        $classes = Kelas::all();
        return view('admin.student', compact('classes'));
    }

    public function read()
    {
    $data = Siswa::leftJoin('kelas', 'kelas.id', '=', 'siswas.class_id')
    ->select(['siswas.id', 'siswas.name', 'siswas.nis','kelas.id as class_id', 'kelas.name as class_name', 'kelas.major'])
    ->get();
        
    return datatables()->of($data)
    ->addIndexColumn()
    ->make(true);
    }

    public function destroy($id)
    {
    $siswa = Siswa::find($id);
    if (!$siswa) {
        return response()->json(['message' => 'Student not found.'], 404);
    }
    $siswa->delete();
    return response()->json(['message' => 'Student deleted successfully.']);
    }

    public function store(Request $request)
    {
    $request->validate([
        'name' => 'required|string|max:255',
        'nis' => 'required|string|max:20',
        'class_id' => 'required|exists:kelas,id'
    ]);
    
    $student = new Siswa;
    $student->name = $request->name;
    $student->nis = $request->nis;
    $student->class_id = $request->class_id;
    $student->save();

    return redirect()->back()->with('success', 'Student added successfully');
    }

    public function update(Request $request)
    {
        try {

            $request->validate([
                'name' => 'required|string|max:255',
                'nis' => 'required|string|max:20',
                'class_id' => 'required|exists:kelas,id'
            ]);

            $student = Siswa::findOrFail($request->id);

            $student->name = $request->name;
            $student->nis = $request->nis;
            $student->class_id = $request->class_id;
            $student->save();


            return response()->json(['success' => 'Student updated successfully']);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage() ], 500);
        }
    }

    public function indexTeacher()
    {
        $classes = Kelas::all();
        return view('teacher.student', compact('classes'));
    }
}
