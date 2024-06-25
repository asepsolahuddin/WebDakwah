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
        

