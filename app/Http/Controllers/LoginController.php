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
                return redirect('/guru/dashboard')->with('success', 'Login successful!');
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
        return view('admin.dashboard');
    }

    public function guru()
    {
        return view('guru.dashboard');
    }
}
