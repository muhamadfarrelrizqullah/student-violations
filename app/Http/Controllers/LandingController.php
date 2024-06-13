<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengguna;
use App\Models\Siswa;
use App\Models\Pelanggaran;


class LandingController extends Controller
{
    public function index()
    {
        $students = Siswa::all();
        $users = Pengguna::all();
        $violations = Pelanggaran::all();
        return view('welcome', compact('students', 'users', 'violations'));
    }
}
