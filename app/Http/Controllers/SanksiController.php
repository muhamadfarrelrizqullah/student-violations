<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sanksi;
use Yajra\DataTables\Facades\DataTables;

class SanksiController extends Controller
{
    public function index()
    {
        return view('admin.sanction');
    }

    public function read()
    {
    $data = Sanksi::select(['id', 'name', 'points'])->get(); 
    return Datatables::of($data)->addIndexColumn()->make(true);
    }

    public function destroy($id)
    {
    $sanksi = Sanksi::find($id);
    if (!$sanksi) {
        return response()->json(['message' => 'Sanction not found.'], 404);
    }
    $sanksi->delete();
    return response()->json(['message' => 'Sanction deleted successfully.']);
    }

    public function store(Request $request)
    {
    $request->validate([
        'name' => 'required|string|max:100',
        'points' => 'nullable|string|max:100',
    ]);

    $sanction = new Sanksi;
    $sanction->name = $request->name;
    $sanction->points = $request->points;
    $sanction->save();

    return redirect()->back()->with('success', 'Sanction added successfully');
    }

    public function update(Request $request)
    {
        try {

            $request->validate([
                'name' => 'required|string|max:100',
                'points' => 'nullable|string|max:100',
            ]);

            $sanction = Sanksi::findOrFail($request->id);

            $sanction->name = $request->name;
            $sanction->points = $request->points;
            $sanction->save();


            return response()->json(['success' => 'Sanction updated successfully']);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage() ], 500);
        }
    }
}
