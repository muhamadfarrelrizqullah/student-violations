<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pengguna;
use App\Models\Profil;
use Yajra\DataTables\Facades\DataTables;

class PenggunaController extends Controller
{
    public function index()
    {
        return view('admin.user');
    }

    public function read()
    {
    $data = Pengguna::leftJoin('profils', 'penggunas.id', '=', 'profils.user_id')
    ->select(['penggunas.id', 'penggunas.email', 'penggunas.role', 'penggunas.status', 'profils.name', 'profils.phone'])
    ->get();

    return datatables()->of($data)
    ->addIndexColumn()
    ->make(true);
    }

    public function destroy($id)
    {
    $pengguna = Pengguna::find($id);
    if (!$pengguna) {
        return response()->json(['message' => 'User not found.'], 404);
    }
    $pengguna->delete();
    return response()->json(['message' => 'User deleted successfully.']);
    }

    public function store(Request $request)
    {
    $request->validate([
        'name' => 'required|string|max:100',
        'noTelp' => 'required|string|max:100',
        'email' => 'required|email|unique:penggunas,email',
        'password' => 'required|min:5',
        'role' => 'required|in:Admin,Guru,Teknisi',
        'status' => 'required|in:Aktif,Tidak Aktif',
    ]);

    $user = new Pengguna;
    $user->email = $request->email;
    $user->password = bcrypt($request->password);
    $user->role = $request->role;
    $user->status = $request->status;
    $user->save();

    $profil = new Profil;
    $profil->user_id = $user->id;
    $profil->name = $request->name;
    $profil->phone = $request->noTelp;
    $profil->save();

    return redirect()->back()->with('success', 'User added successfully');
    }

    public function update(Request $request)
{
    try {
        $request->validate([
            'name' => 'required|string|max:100',
            'noTelp' => 'required|string|max:100', 
            'email' => 'required|email|unique:penggunas,email,'. $request->id,
            'password' => 'required|min:5',
            'role' => 'required|in:Admin,Guru,Teknisi',
            'status' => 'required|in:Aktif,Tidak Aktif',
        ]);

        $user = Pengguna::findOrFail($request->id);

        if (Auth::id() === $user->id) {
            return response()->json(['message' => 'You cannot edit your own data.'], 403);
        }

        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role = $request->role;
        $user->status = $request->status;
        $user->save();

        $profil = Profil::where('user_id', $request->id)->first();
        if ($profil) {
            $profil->name = $request->name;
            $profil->phone = $request->noTelp; 
            $profil->save();
        }

        return response()->json(['success' => 'User updated successfully']);
    } catch (\Throwable $th) {
        return response()->json(['message' => $th->getMessage() ], 500);
    }
}

}
