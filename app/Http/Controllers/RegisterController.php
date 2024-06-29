<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function halamanRegister(){
        return view('admin.pages.rg-admin');
    }

    public function register(Request $request){
        $this->validator($request->all())->validate();
        
        $user = $this->create($request->all());

        auth()->login($user);

        return redirect()->route('login');
    }

    public function register_ustad(Request $request) {
        
        $request->validate([
            'name' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'phone_number' => 'required|string|max:15',
            'ktp_path' => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'pp_path' => 'required|image|mimes:jpeg,jpg,png|max:2048'
        ]);

        $ktp_path = $request->file('ktp_path');
        $ktp_path->storeAs('public/products', $ktp_path->hashName());

        $pp_path = $request->file('pp_path');
        $pp_path->storeAs('public/products', $pp_path->hashName());
    
    
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role_id' => 3,
                'active_status' => 0,
                'phone_number' => $request->phone_number,
                'spesialis' => $request->spesialis,
                'prestasi' => $request->prestasi,
                'ktp_path' => $ktp_path->hashName(),
                'pp_path' => $pp_path->hashName(),
            ]);
    
            return redirect()->route('login');
    }

    protected function validator(array $data){
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255','unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    protected function create(array $data){
        return User::create([
            'name' => $data['name'],
            'email'=> $data['email'],
            'password'=> Hash::make($data['password']),
            'role_id' => '2'
        ]);
    }
    }
        

