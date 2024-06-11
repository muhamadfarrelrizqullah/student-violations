<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengguna;
use App\Models\Profil;
use Illuminate\Support\Facades\Auth;

class ProfilController extends Controller
{
    public function index()
    {
        return view('admin.profile');
    }

    public function edit()
    {
        $userId = Auth::id();
        $users = Pengguna::findOrFail($userId); 
        $profiles = Profil::where('user_id', $userId)->first();

        return view('admin.profile-edit', compact('users', 'profiles'));
    }

    public function update(Request $request)
    {
        try {
            $userId = Auth::id();

            $request->validate([
                'name' => 'required|string|max:100',
                'phone' => 'required|string|max:100',
                'email' => 'required|email|unique:penggunas,email,'. $userId,
                'password' => 'required|min:5',
                'confirmPassword' => 'required|same:password',
            ]);

            $user = Pengguna::findOrFail($userId);
                
            $user->email = $request->input('email');
            $user->password = bcrypt($request->input('password'));
            $user->save();

            $profil = Profil::where('user_id', $userId)->first();
            if($profil){
                $profil->name = $request->input('name');
                $profil->phone = $request->input('phone');
                $profil->save();
            }

            return response()->json(['success' => 'User updated successfully']);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }

    public function indexTeacher()
    {
        return view('teacher.profile');
    }

    public function editTeacher()
    {
        $userId = Auth::id();
        $users = Pengguna::findOrFail($userId); 
        $profiles = Profil::where('user_id', $userId)->first();

        return view('teacher.profile-edit', compact('users', 'profiles'));
    }
}
