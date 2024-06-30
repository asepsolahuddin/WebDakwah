<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        return view('admin.pages.lg-admin');
    }

    public function dologin(Request $request)
    {
        // validasi
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $getUserDataByEmail = User::where('email', $credentials['email'])->first();

        if(!$getUserDataByEmail) {
            return back()->with('error', 'Akun Tidak Ditemukan');
        }

        if($getUserDataByEmail->active_status == 0) {
            return back()->with('error', 'Akun belum aktif');
        }

        auth()->attempt($credentials);
        
        // if (auth()->attempt($credentials)) {

        //     // buat ulang session login
        //     $request->session()->regenerate();

        //     if (auth()->user()->active_status == 0) {
        //         return back()->with('error', 'akun tidak aktif');
        //     }

        //     if (auth()->user()->role_id === 1) {
        //         // jika user superadmin
        //         return redirect()->intended('/dbadmin');
        //     } else {
        //         // jika user pegawai
        //         return redirect()->intended('/dashboard');
        //     }
        // }

        // jika email atau password salah
        // kirimkan session error
        return back()->with('error', 'email atau password salah');
    }

    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
