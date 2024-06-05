<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use Yajra\DataTables\Facades\DataTables;

class KategoriController extends Controller
{
    public function index()
    {
        return view('admin.category');
    }

    public function read()
    {
    $data = Kategori::select(['id', 'name', 'description'])->get(); 
    return Datatables::of($data)->addIndexColumn()->make(true);
    }

    public function destroy($id)
    {
    $kategori = Kategori::find($id);
    if (!$kategori) {
        return response()->json(['message' => 'Category not found.'], 404);
    }
    $kategori->delete();
    return response()->json(['message' => 'Category deleted successfully.']);
    }

    public function store(Request $request)
    {
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string|max:500',
    ]);

    $category = new Kategori;
    $category->name = $request->name;
    $category->description = $request->description;
    $category->save();

    return redirect()->back()->with('success', 'Category added successfully');
    }

    public function update(Request $request)
    {
        try {

            $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'nullable|string|max:500',
            ]);

            $category = Kategori::findOrFail($request->id);

            $category->name = $request->name;
            $category->description = $request->description;
            $category->save();


            return response()->json(['success' => 'Pengguna berhasil diupdate']);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage() ], 500);
        }
    }


}
