<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use App\Models\Siswa;
use App\Models\Pelanggaran;
use App\Models\Kategori;
use App\Models\Kelas;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function autentikasi(Request $request)
    {
        Session::flash('email', $request->email);
        Session::flash('password', $request->password);

        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $infologin = [
            'email' => $request->email,
            'password' => $request->password
        ];

    if (Auth::attempt($infologin)) {
        if (Auth::user()->status == 'Aktif') {
            if (Auth::user()->role == 'Admin') {
                return redirect('/admin/dashboard')->with('success', 'Login successful!');
            } else if (Auth::user()->role == 'Guru') {
                return redirect('/teacher/dashboard')->with('success', 'Login successful!');
            }
        } else {
            Auth::logout();
            return redirect('/login')->with('error', 'Account is inactive.');
        }
    } else {
        return redirect('/login')->with('error', 'Invalid email or password.');
    }      
    }

    public function login()
    {
        return view('auth.login');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login');
    }

    public function admin()
    {
        $studentsWithoutViolation = Siswa::whereDoesntHave('pelanggaran')->count();

        $studentsWithViolation = Siswa::whereHas('pelanggaran')->count();

        $totalStudents = Siswa::count();

        $studentsWithHighPoints = Siswa::whereHas('pelanggaran', function ($query) {
            $query->whereHas('sanksi', function ($subquery) {
                $subquery->where('points', '>', 50);
            });
        })->count();

        $categoriesData = Kategori::withCount('pelanggaran')
        ->get();

        $performance = Pelanggaran::select(DB::raw('DATE(date) as date'), DB::raw('COUNT(*) as pelanggaran_count'))
        ->groupBy(DB::raw('DATE(date)'))
        ->orderBy(DB::raw('DATE(date)'), 'asc')
        ->get();

        return view('admin.dashboard', compact('totalStudents','studentsWithoutViolation','studentsWithViolation','studentsWithHighPoints','categoriesData', 'performance'));
    }

    public function teacher()
    {
        $user = Auth::user();
        $countViolationsUser = Pelanggaran::where('teacher_id', $user->id)->count();

        $countViolations = Pelanggaran::count();

        $countStudents = Siswa::count();

        $countCategories = Kategori::count();

        $countClasses = Kelas::count();

        $performance = Pelanggaran::select(DB::raw('DATE(date) as date'), DB::raw('COUNT(*) as pelanggaran_count'))
        ->groupBy(DB::raw('DATE(date)'))
        ->orderBy(DB::raw('DATE(date)'), 'asc')
        ->get();
        
        return view('teacher.dashboard', compact('countViolationsUser', 'countViolations', 'countStudents', 'countCategories', 'countClasses', 'performance'));
    }
}
