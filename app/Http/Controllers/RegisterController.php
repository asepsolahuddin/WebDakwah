<?php

namespace App\Http\Controllers;

use App\Mail\SendEmail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function halamanRegister()
    {
        return view('admin.pages.rg-admin');
    }

    public function register(Request $request)
    {
        try {
            $this->validator($request->all())->validate();

            $user = $this->create($request->all());

            $this->sendMail($user->id, $user->email);

            return redirect()->back()->with('success', "Akun anda berhasil dibuat, silakan verifikasi untuk masuk ke website");
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }


    public function sendMail($id, $email)
    {
        try {
            $encodedToken = $this->generateVerificationToken($id);
            $link = 'http://127.0.0.1:8000/verify-user/' . $encodedToken;
            $data = [
                'link' => $link,
            ];
            Mail::to($email)->send(new SendEmail($data));
            
            return array('success' => true, 'message' => "Success Send Email Verification");
        } catch (\Throwable $th) {
            return $th;
        }
    }

    public function generateVerificationToken($idRegisteredUser)
    {
        $idUser = $idRegisteredUser;
        $secretKey = "Rahasia";
        $expiredLink = time() + 60 * 60;

        $plainToken = "$idUser:$secretKey:$expiredLink";
        $encodedToken = base64_encode($plainToken);
        return $encodedToken;
    }

    public function verifyUser($token)
    {
        $decodedToken = base64_decode($token);
        $plainToken = explode(":", $decodedToken);
        $secretKey = "Rahasia";

        $idUser = $plainToken[0];
        $secretKeyToken = $plainToken[1];
        $expiredToken = $plainToken[2];

        if ($secretKeyToken != $secretKey) {
            return redirect()->route('login')->with('error', 'Link Tidak Sesuai');
        }

        $user = User::find($idUser);

        if ($expiredToken < time()) {
            if ($user) {
                $user->delete();
            }
            return redirect()->route('login')->with('error', 'Kelamaan bro, Tokennya expired silahkan register kembali');
        }
        
        User::where('id', $idUser)->update(['active_status' => 1]);
        return redirect()->route('login')->with('success', 'Selamat akun anda sudah terdaftar, Silahkan Login');
    }

    public function register_ustad(Request $request)
    {

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

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role_id' => '2'
        ]);
    }
}
