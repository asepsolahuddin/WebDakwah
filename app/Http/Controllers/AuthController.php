<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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

        
        if (auth()->attempt($credentials)) {
            return redirect()->intended('dashboard'); // Redirect to intended page after successful login
        }else{
            return back()->with('error', 'email atau password salah');
        }
        
        
    }

    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
