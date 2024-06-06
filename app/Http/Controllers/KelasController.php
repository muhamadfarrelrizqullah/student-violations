<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;
use Yajra\DataTables\Facades\DataTables;

class KelasController extends Controller
{
    public function index()
    {
        return view('admin.class');
    }

    public function read()
    {
    $data = Kelas::select(['id', 'name', 'major'])->get(); 
    return Datatables::of($data)->addIndexColumn()->make(true);
    }

    public function destroy($id)
    {
    $kelas = Kelas::find($id);
    if (!$kelas) {
        return response()->json(['message' => 'Class not found.'], 404);
    }
    $kelas->delete();
    return response()->json(['message' => 'Class deleted successfully.']);
    }

    public function store(Request $request)
    {
    $request->validate([
        'name' => 'required|string|max:100',
        'major' => 'nullable|string|max:100',
    ]);

    $class = new Kelas;
    $class->name = $request->name;
    $class->major = $request->major;
    $class->save();

    return redirect()->back()->with('success', 'Class added successfully');
    }

    public function update(Request $request)
    {
        try {

            $request->validate([
                'name' => 'required|string|max:100',
                'major' => 'nullable|string|max:100',
            ]);

            $class = Kelas::findOrFail($request->id);

            $class->name = $request->name;
            $class->major = $request->major;
            $class->save();


            return response()->json(['success' => 'Class updated successfully']);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage() ], 500);
        }
    }
}
