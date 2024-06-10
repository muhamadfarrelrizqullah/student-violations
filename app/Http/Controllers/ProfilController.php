<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengguna;

class ProfilController extends Controller
{
    public function index()
    {
        $users = Pengguna::all();
        return view('admin.profile', compact('users'));
    }

    public function edit()
    {
        $users = Pengguna::all();
        return view('admin.profile-edit', compact('users'));
    }
}
